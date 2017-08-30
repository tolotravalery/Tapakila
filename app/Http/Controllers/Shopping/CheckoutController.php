<?php

namespace App\Http\Controllers\Shopping;

use App\Models\Product;
use App\Models\Ticket;
use App\Models\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Models\Checkout;
use \Cart as Cart;
use App\Models\Payement_mode;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    function index()
    {
        $payement_mode = Payement_mode::get();
        return view('shopping.checkout', array('payement_mode' => $payement_mode));
    }

    function store(Request $request)
    {
        //dd(Cart::content());
        $tickets = array();
        $i = 0;
        foreach (Cart::content() as $item) {
            $tickets[$i] = array(
                "id" => $item->id,
                "qty" => $item->qty,
                "name" => $item->name,
                "price" => $item->price);
            $i++;
        }

        $adresseFacturation = array("name" => $request->input("fact_name"),
            "adresse" => $request->input("fact_adress"),
            "city" => $request->input("fact_city"),
            "phone" => $request->input("fact_phone"),
            "mail" => $request->input("fact_mail"));
        $adresseLivraison = array("mail" => $request->input("livr_mail"));
        $payement_method = $request->input("radio");
        $checkout = new Checkout($adresseFacturation, $adresseLivraison, $payement_method, $tickets);
        $payement_mode = Payement_mode::get();
        //dd($checkout);
        return view('shopping.summary')->with(array('checkout' => $checkout, 'payement_mode' => $payement_mode));
    }

    function save(Request $request)
    {
        foreach (Cart::content() as $item) {
            // save from database
            $ticket = Ticket::findOrFail($item->id);
            //$product = User::findOrFail(1);
            //dd($product->users());
            $date = date('Y-m-d H:i:s');
            $payement = '';

            if ($request->input('payement_mode') == 'MVola') {
                $payement = 1;
            } elseif ($request->input('payement_mode') == 'Orange Money') {
                $payement = 2;
            } elseif ($request->input('payement_mode') == 'Airtel Money') {
                $payement = 3;
            }
            //dd($payement);
            $ticket->users()->sync(array(Auth::user()->id => array('number' => $item->qty, 'date_achat' => $date,
                'payement_mode_id' => $payement)));
        }
        Cart::destroy();
        // checkout users
        $user = User::findOrFail(1);
        return redirect('/home');
    }
}
