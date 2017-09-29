<?php

namespace App\Http\Controllers\Shopping;

use App\Models\Menus;
use App\Models\Product;
use App\Models\Sous_menus;
use App\Models\Tapakila;
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
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        $payement_mode = Payement_mode::get();
        return view('shopping.checkout',compact('menus', 'sousmenus','payement_mode'));
    }

    /*function store(Request $request)
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
    }*/

    function save(Request $request)
    {
        $options = $request->input('options');
        $payement = Payement_mode::where('slug', '=', $options)->get()[0];
        foreach (Cart::content() as $item) {
            $ticket = Ticket::findOrFail($item->id);
            $date = date('Y-m-d H:i:s');
            $nombre = $item->qty;
            for ($i = 0; $i < $nombre; $i++) {
                $tapakila = $ticket->tapakila()->where('vendu', '=', '0')->get()->random(1)[0];
                $tapakila->vendu = 1;
                $renderer = new \BaconQrCode\Renderer\Image\Png();
                $renderer->setHeight(256);
                $renderer->setWidth(256);
                $writer = new \BaconQrCode\Writer($renderer);
                $image_name = strtotime('now');
                $writer->writeFile($tapakila->code_unique, 'public/qr_code/' . $image_name . '.png');
                $tapakila->qr_code = $image_name . '.png';
                $tapakila->save();
                $ticket->number = $ticket->number - 1;
            }
            $ticket->users()->sync(array(Auth::user()->id => array('number' => $item->qty, 'date_achat' => $date,
                'payement_mode_id' => $payement->id)));
            $ticket->save();
        }
        Cart::destroy();
        return redirect(url('/shopping/cart'));
    }
}
