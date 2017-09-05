<?php

namespace App\Http\Controllers\Shopping;

use App\Models\Menus;
use App\Models\Sous_menus;
use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        return view('shopping.cart', array('menus' => $menus, 'sousmenus' => $sousmenus));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('shopping/cart')->withSuccessMessage('Ce ticket est déjà dans votre panier');
        }

        Cart::add($request->id, $request->type, 1, $request->price)->associate('App\Models\Ticket');
        return redirect('shopping/cart')->withSuccessMessage('Ce ticket est ajouté dans votre panier');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('error_message', 'Quantité devrait entre 1 et 5');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantité est à jour avec succès');

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('shopping/cart')->withSuccessMessage('Ce ticket est enlevé dans votre panier');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('shopping/cart')->withSuccessMessage('Votre panier est maintenant vide');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('shopping/cart')->withSuccessMessage('Item is already in your Wishlist!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Models\Product');

        return redirect('shopping/cart')->withSuccessMessage('Item has been moved to your Wishlist!');

    }
}
