<?php

namespace App\Http\Controllers\Shopping;

use App\APIPayment\MVola;
use App\APIPayment\OrangeMoney;
use App\Models\Menus;
use App\Models\Sous_menus;
use App\Models\Ticket;
use App\Models\TicketUser;
use App\Models\User;
use \Cart as Cart;
use App\Models\Payement_mode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    function index(Request $req)
    {
        $options = $req->input('options');
        if ($options) {
            $payement = Payement_mode::where('slug', '=', $options)->get()[0];
            // create order here
            $achat_reference = date('m') . '' . date('y') . '' . rand(1, 10000);
            $order = new OrderCreator(Auth::user()->id,$achat_reference,$options);
            $dataOrder = $order->createOrder();
            Session::put('$dataOrder', $dataOrder);
            // send customer to payment
            if ($payement->slug == 'orange') {
                Session::put('$achat_reference', $achat_reference);
                $om = new OrangeMoney($req->input('amount'), $achat_reference);
                $payementOrange = $om->getPaymentUrl(url('/shopping/checkout/orange'));
                Session::put('notif_token', $payementOrange->notif_token);
                return redirect($payementOrange->payment_url);
            } elseif ($payement->slug == 'telma') {
                Session::put('$achat_reference', $achat_reference);
                $mvola = new MVola($req->input('amount'), $achat_reference, Auth::user());
                $check = $mvola->getPaymentUrl(1);
                if ($check['status']) {
                    Session::put('MPGwToken', $check['token']);
                    return redirect($check['message']);
                } else {
                    echo $check['message'];
                    die();
                }
            }
        }
        return redirect('/');
    }


    function checkStatusInstant(Request $request){
        if(Session::has('$achat_reference')){
            //check status payment
            $data = Session::get('$dataOrder');
            if(!is_null(Session::get('notif_token'))){
                $notifToken =  Session::get('notif_token');
                if ($this->getStatus($notifToken)) {

                    // update paymentstatus

                    $user = Auth::user();
                    $ticket = $user->tickets()->wherePivot('achat_reference', '=',Session::get('$achat_reference'))->get()[0];
                    $ticket->pivot->status_payment = 'SUCCESS';

                    $ticket->pivot->save();

                    $user = Auth::user();
                    Mail::send('emails.ticket', ['data' => $data, 'user' => $user, 'send' => 'mail'], function ($message) use ($data) {
                        $message->to(Auth::user()->email, Auth::user()->name);
                        $message->cc('reservations@leguichet.mg', 'Leguichet.mg')->subject('Leguichet ticket');
                        foreach ($data as $d) {
                            foreach ($d['tapakila'] as $tapakila) {
                                $pdfAttachement = public_path('/tickets/' . $tapakila->pdf);
                                $message->attach($pdfAttachement);
                            }
                        }
                    });
                    $request->session()->flash('status_payment', "Votre paiement est réussi.");
                    Session::forget('$achat_reference');
                    return redirect(url('/accueil'));
                }
            }elseif(!is_null(Session::get('MPGwToken'))){
                $mv = new MVola();
                $mvola_status = $mv->getNotification(Session::get('MPGwToken'));
                if ($mvola_status['status'] == 4) {

                    // update paymentstatus

                    $user = Auth::user();
                    $ticket = $user->tickets()->wherePivot('achat_reference', '=',Session::get('$achat_reference'))->get()[0];
                    $ticket->pivot->status_payment = 'SUCCESS';

                    $ticket->pivot->save();

                    Mail::send('emails.ticket', ['data' => $data, 'user' => $user, 'send' => 'mail'], function ($message) use ($data) {
                        $message->to(Auth::user()->email, Auth::user()->name);
                        $message->cc('reservations@leguichet.mg', 'Leguichet.mg')->subject('Leguichet ticket');
                        foreach ($data as $d) {
                            foreach ($d['tapakila'] as $tapakila) {
                                $pdfAttachement = public_path('/tickets/' . $tapakila->pdf);
                                $message->attach($pdfAttachement);
                            }
                        }
                    });
                    $request->session()->flash('status_payment', "Votre paiement est réussi.");
                    Session::forget('$achat_reference');
                    return redirect(url('/accueil'));
                }
            }
        }
    }

    function saveOrange(Request $request)
    {
        return redirect(url('/accueil'));
    }

    function proxyOrange()
    {

    }

    function proxyTelma()
    {

    }


    function saveTelma(Request $request)
    {

        //check status
        $mv = new MVola();
        $mvola_status = $mv->getNotification(Session::get('MPGwToken'));
        if ($mvola_status['user_field'] == 1) {
            if ($mvola_status['status'] == 4) {
                return redirect(url('/accueil'));
            }
        } elseif ($mvola_status['user_field'] == 2) {
            $id = Session::get('pay_id');
            $number = Session::get('pay_number');
            $payement = Payement_mode::where('slug', '=', 'telma')->get()[0];
            $date = date('Y-m-d H:i:s');
            $users = Auth::user();
            if ($mvola_status['status'] == 4) {
                $ticket_to_pay = $users->tickets()->wherePivot('id', '=', $id)->get()[0];
                $ticket_to_pay->pivot->number = $number;
                $ticket_to_pay->pivot->date_achat = $date;
                $ticket_to_pay->pivot->payement_mode_id = $payement->id;
                $tic = array();
                $tap = array();
                $data = array();
                for ($i = 0; $i < $number; $i++) {
                    $tapakila = $ticket_to_pay->tapakila()->where('vendu', '=', '0')->get()->random(1)[0];
                    $tapakila->vendu = 1;
                    $ticket_to_pay->number = $ticket_to_pay->number - 1;
                    $ticket_to_pay->pivot->status_payment = 'SUCCESS';
                    $tapakila->save();
                    $tap[$i] = $tapakila;
                }
                $ticket_to_pay->pivot->save();
                $ticket_to_pay->save();
                $tic[0] = $ticket_to_pay;
                $data[0] = array('ticket' => $tic[0], 'tapakila' => $tap);
                $user = Auth::user();
                Session::put('email_livraison', Auth::user()->email);
                Mail::send('emails.ticket', ['data' => $data, 'user' => $user, 'send' => 'mail'], function ($message) use ($data) {
                    $message->to(Auth::user()->email, Auth::user()->name);
                    $message->cc('reservations@leguichet.mg', 'Leguichet.mg')->subject('Leguichet ticket');
                    foreach ($data as $d) {
                        foreach ($d['tapakila'] as $tapakila) {
                            $pdfAttachement = public_path('/tickets/' . $tapakila->pdf);
                            $message->attach($pdfAttachement);
                        }
                    }
                });
                session()->flash('status_payment', "Votre paiement est réussi.");
                return redirect(url('/accueil'));
            }
        }
    }

    function pay($users_id, $id)
    {
        if ($users_id != Auth::user()->id)
            abort('403');
        $users = User::find($users_id);
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        $payement_mode = Payement_mode::get();
        $ticket_to_pay = $users->tickets()->wherePivot('id', '=', $id)->get();
        return view('shopping.payment', compact('users', 'id', 'sousmenus', 'menus', 'payement_mode', 'ticket_to_pay'));
    }

    function checkoutOnePayment(Request $req)
    {
        $options = $req->input('options');
        $payement = Payement_mode::where('slug', '=', $options)->get()[0];
        if ($payement->slug == 'orange') {
            $om = new OrangeMoney($req->input('amount'));
            $payementOrange = $om->getPaymentUrl(url('/shopping/checkout/pay/orange'));
            Session::put('notif_token', $payementOrange->notif_token);
            Session::put('pay_id', $req->input('id'));
            Session::put('pay_number', $req->input('number'));
            if ($req->input('email_livraison'))
                Session::put('email_livraison', $req->input('email_livraison'));
            return redirect($payementOrange->payment_url);
        } elseif ($payement->slug == 'telma') {
            $achat = TicketUser::findOrFail($req->input('id'));
//            dd($achat->achat_reference);
            Session::put('pay_id', $req->input('id'));
            Session::put('pay_number', $req->input('number'));
            $mvola = new MVola($req->input('amount'), $achat->achat_reference, Auth::user());
            $check = $mvola->getPaymentUrl(2);
            if ($check['status']) {
                Session::put('MPGwToken', $check['token']);
                return redirect($check['message']);
            } else {
                echo $check['message'];
                die();
            }
        }
    }

    function savePaymentOrange()
    {
        $notifToken = Session::get('notif_token');
        $id = Session::get('pay_id');
        $number = Session::get('pay_number');
        $payement = Payement_mode::where('slug', '=', 'orange')->get()[0];
        $date = date('Y-m-d H:i:s');
        $users = Auth::user();
        if ($this->getStatus($notifToken)) {
            $ticket_to_pay = $users->tickets()->wherePivot('id', '=', $id)->get()[0];
            $ticket_to_pay->pivot->number = $number;
            $ticket_to_pay->pivot->date_achat = $date;
            $ticket_to_pay->pivot->payement_mode_id = $payement->id;
            $tic = array();
            $tap = array();
            $data = array();
            for ($i = 0; $i < $number; $i++) {
                $tapakila = $ticket_to_pay->tapakila()->where('vendu', '=', '0')->get()->random(1)[0];
                $tapakila->vendu = 1;
                $ticket_to_pay->number = $ticket_to_pay->number - 1;
                $ticket_to_pay->pivot->status_payment = 'SUCCESS';
                $tapakila->save();
                $tap[$i] = $tapakila;
            }
            $ticket_to_pay->pivot->save();
            $ticket_to_pay->save();
            $tic[0] = $ticket_to_pay;
            $data[0] = array('ticket' => $tic[0], 'tapakila' => $tap);
            $user = Auth::user();
            Session::put('email_livraison', Auth::user()->email);
            Mail::send('emails.ticket', ['data' => $data, 'user' => $user, 'send' => 'mail'], function ($message) use ($data) {
                $message->to(Auth::user()->email, Auth::user()->name);
                $message->cc('reservations@leguichet.mg', 'Leguichet.mg')->subject('Leguichet ticket');
                foreach ($data as $d) {
                    foreach ($d['tapakila'] as $tapakila) {
                        $pdfAttachement = public_path('/tickets/' . $tapakila->pdf);
                        $message->attach($pdfAttachement);
                    }
                }
            });
            session()->flash('status_payment', "Votre paiement est réussi.");
            return redirect(url('/accueil'));
        } else {
            session()->flash('status_payment', "Votre paiement n'est pas réussi.");
            return redirect(url('/accueil'));
        }

    }

    function NotifyOrange(Request $req)
    {
        $handle = fopen("Logs/orange_" . date('Y-m-d') . '.txt', 'a+');
        $data = json_encode(array('status' => $req->input('status'), 'notif_token' => $req->input('notif_token'), 'txnid' => $req->input('txnid')));
        fwrite($handle, $data . "\n", 4096);
    }

    function NotifyTelma(Request $req)
    {
        $handle = fopen("Logs/telma_" . date('Y-m-d') . '.txt', 'a+');
        $data = json_encode(array('Shop_TransactionID' => $req->input('Shop_TransactionID')));
        fwrite($handle, $data . "\n", 4096);
    }

    function getStatus($token)
    {
        $myJson = array();

        if ($file = fopen('Logs/' . date('Y-m-d') . '.txt', "r")) {
            $i = 0;
            while (!feof($file)) {
                $line = fgets($file);
                $json = json_decode($line, false);
                $myJson[$i] = $json;
                $i++;
            }
            fclose($file);
        }

        foreach ($myJson as $j) {
            if ($j->notif_token == $token) {
                if (($j->status) == "SUCCESS")
                    return true;
                else return false;
            }
        }
        return false;
    }
}
