<?php

namespace App\Http\Controllers\Shopping;

use App\Models\Menus;
use App\Models\Payement_mode;
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
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        $payement_mode = Payement_mode::get();
        return view('shopping.cart', array('menus' => $menus, 'sousmenus' => $sousmenus,'payement_mode'=>$payement_mode));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->input());
        $ids = $request->input('id');
        $types = $request->input('type');
        $prices = $request->input('price');
        $nombres = $request->input('nombre');
        $isa = count($ids);
        for ($i = 0; $i < $isa; $i++) {
            if ($nombres[$i] > 0) {
                /* $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
                     return $cartItem->id ==  $ids[$i];
                 });
                 if (!$duplicates->isEmpty()) {
                     return redirect('shopping/cart')->withSuccessMessage('Ce ticket est déjà dans votre panier');
                 }    */
                Cart::add($ids[$i], $types[$i], $nombres[$i], $prices[$i])->associate('App\Models\Ticket');

                //echo $ids[$i];
            } else echo "zero";
        }
        return redirect('shopping/cart')->withSuccessMessage('Ce ticket est ajouté dans votre panier');
        //echo $isa;
        //var_dump($ids,$types,$prices,$nombres);
        exit();
        /* $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
             return $cartItem->id === $request->id;
         });

         if (!$duplicates->isEmpty()) {
             return redirect('shopping/cart')->withSuccessMessage('Ce ticket est déjà dans votre panier');
         }

         Cart::add($request->id, $request->type, 1, $request->price)->associate('App\Models\Ticket');
         return redirect('shopping/cart')->withSuccessMessage('Ce ticket est ajouté dans votre panier');*/
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
            'quantity' => 'required|numeric'
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
        return response()->json(['success' => true]);
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
