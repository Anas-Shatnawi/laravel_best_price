<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class Cart extends Controller
{
    // view cart with session cart inforamtion
    public function getCart(){
        // if session ha no cart
        if(!Session::has('cart')){
            return view ('userView.cart',['products'=>null]);
        }
       
        // if it has a cart return it,with all information{items,totalPrice,totalQty}
        $cart = Session::get('cart');
        $user = Auth::user();
        
        return view('userView.cart',['products'=> $cart->items,'totalPrice' => $cart->totalPrice,'totalQty'=>$cart->totalQty,'user'=>$user]);

    }

    //using [ajax] its a function to delete item from the session cart 
    public function deleteItem($id){
        // get all data for the cart from the session
        $cart = Session::get('cart');
       
        // reset new total and new qty
        $cart->totalPrice = $cart->totalPrice - $cart->items[$id]['price'];
        $cart->totalQty = $cart->totalQty - $cart->items[$id]['qty'];
       
        // delete the item from items object and reset cart to the new info
        unset($cart->items[$id]);
        session()->put('cart', $cart);
    }

    // public function getIncreaseQty($id){
    //     $oldCart = Session::has('cart') ? session::get('cart'):null;
    //     $cart = new Cart($oldCart);
    //     $cart ->increaseQty($id);
    //     $request->session()->put('cart', $cart);
    //     return redirect('/cart');
    // }
}
