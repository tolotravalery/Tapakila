<?php

namespace App\Http\Controllers\Shopping;

use Illuminate\Http\Request;
use App\Models\Checkout;
use \Cart as Cart;

class CheckoutController extends Controller
{
    function index($montant)
    {
        return view('shopping.checkout');
    }

    function store(Request $request)
    {
        //dd(Cart::content());
        $products = array();
        $i = 0;
        foreach (Cart::content() as $item) {
            $products[$i] = array("id" => $item->id,
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
        $adresseLivraison = array("name" => $request->input("livr_name"),
            "adresse" => $request->input("livr_adress"),
            "city" => $request->input("livr_city"),
            "phone" => $request->input("livr_phone"),
            "mail" => $request->input("livr_mail"));
        $payement_method = $request->input("radio");
        $checkout = new Checkout($adresseFacturation, $adresseLivraison, $payement_method, $products);
        //dd($checkout);
        return view('shopping.summary')->with('checkout', $checkout);
    }
}
