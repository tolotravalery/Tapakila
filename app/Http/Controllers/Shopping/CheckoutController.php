<?php

namespace App\Http\Controllers\Shopping;

use App\Models\Menus;
use App\Models\Sous_menus;
use App\Models\Ticket;
use App\Models\User;
use \Cart as Cart;
use App\Models\Payement_mode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function index(Request $req)
    {
        $ans = $req->input('__hidden_input_ans__');
        $ev = $req->input('__hidden_input_ev__');
        $data = array();
        for ($i = 0; $i < count($ev); $i++) {
            $data[$i] = array('ev' => $ev[$i], 'ans' => $ans[$i]);
        }
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        $payement_mode = Payement_mode::get();
        return view('shopping.checkout', compact('menus', 'sousmenus', 'payement_mode', 'data'));
    }

    function save(Request $request)
    {
        $options = $request->input('options');
        $answer = $request->input('answer');
        $events = $request->input('event');
//        dd($answer);
        $payement = Payement_mode::where('slug', '=', $options)->get()[0];
        // sending data to payment mode and waiting response
        // if response is success
        $tic = array();
        $tap = array();
        $j = 0;
        $temp = array();
        for ($p = 0; $p < count($events); $p++) {
            $temp[$p] = array('ev' => $events[$p], 'rep' => $answer[$p]);
        }
        foreach (Cart::content() as $item) {
            $ticket = Ticket::findOrFail($item->id);
            $date = date('Y-m-d H:i:s');
            $nombre = $item->qty;
            for ($i = 0; $i < $nombre; $i++) {
                $tapakila = $ticket->tapakila()->where('vendu', '=', '0')->get()->random(1)[0];
                $event = $ticket->events()->take(1)->get()[0];
                foreach ($temp as $t) {
                    if ($t['ev'] == $event->id) {
                        $tapakila->reponse = $t['rep'];
                    }
                }
                // if payment is success
                $tapakila->vendu = 1;
                $renderer = new \BaconQrCode\Renderer\Image\Png();
                $renderer->setHeight(256);
                $renderer->setWidth(256);
                $writer = new \BaconQrCode\Writer($renderer);
                $image_name = strtotime('now');
                $writer->writeFile($tapakila->code_unique, 'public/qr_code/' . $image_name . '.png');
                $tapakila->qr_code = $image_name . '.png';
                $ticket->number = $ticket->number - 1;
//                $ticket->pivot->status_payment = 'SUCCESS';
                $tapakila->save();
                $tap[$i] = $tapakila;
            }

            $ticket->users()->attach(array(Auth::user()->id => array('number' => $item->qty, 'date_achat' => $date,
                'payement_mode_id' => $payement->id)));
            $ticket->save();
            $tic[$j] = $ticket;
            $j++;
        }
        Cart::destroy();
//        return redirect(url('/shopping/cart'));
        Mail::send('emails.ticket', ['tic' => $tic, 'tap' => $tap], function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)->subject('Leguichet');
        });
        return view('emails.ticket', compact('tic', 'tap'));
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

    function savePayment(Request $req)
    {
        $payement = Payement_mode::where('slug', '=', $req->input('options'))->get()[0];
        $date = date('Y-m-d H:i:s');
        $users = Auth::user();
        // sending data to payment mode and waiting response
        // if response is success
        $ticket_to_pay = $users->tickets()->wherePivot('id', '=', $req->input('id'))->get()[0];
        $ticket_to_pay->pivot->number = $req->input('number');
        $ticket_to_pay->pivot->date_achat = $date;
        $ticket_to_pay->pivot->payement_mode_id = $payement->id;
        $tic = array();
        $tap = array();
        for ($i = 0; $i < $req->input('number'); $i++) {
            $tapakila = $ticket_to_pay->tapakila()->where('vendu', '=', '0')->get()->random(1)[0];
            $tapakila->vendu = 1;
            $renderer = new \BaconQrCode\Renderer\Image\Png();
            $renderer->setHeight(256);
            $renderer->setWidth(256);
            $writer = new \BaconQrCode\Writer($renderer);
            $image_name = strtotime('now');
            $writer->writeFile($tapakila->code_unique, 'public/qr_code/' . $image_name . '.png');
            $tapakila->qr_code = $image_name . '.png';
            $tapakila->save();
            $tap[$i] = $tapakila;
            $ticket_to_pay->number = $ticket_to_pay->number - 1;
        }
        $ticket_to_pay->pivot->save();
        $ticket_to_pay->save();
        $tic[0] = $ticket_to_pay;
//        $pdf = App::make('dompdf.wrapper');
//        $pdf->loadHTML(view('emails.ticket', compact('tic', 'tap'))->render());
        Mail::send('emails.ticket', ['tic' => $tic, 'tap' => $tap], function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)->subject('Leguichet');
//            $message->embed($pdf->stream());
        });

        return view('emails.ticket', compact('tic', 'tap'));
    }

    function quiz(Request $req)
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('shopping.question_secret', compact('menus', 'sousmenus'));
    }
}
