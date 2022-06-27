<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;
use Auth;

class CheckoutController extends Controller
{
    public function index($id){
        $cart = Session::get('cart');
        $user = DB::table('users')->where('id',$id)->get();

        return view('userView.checkout',['products'=> $cart->items,'totalPrice' => $cart->totalPrice,'totalQty'=>$cart->totalQty,'user'=>$user]);
    }

    public function placeOrder(){
        $cart = Session::get('cart');
        $cartItems = Session::get('cart')->items;
        $user = Auth::id();

        $orders = DB::table('orders')->where('user_id',$user)->get();
        
        foreach ($cartItems as $cartItem) {
            if ($orders->isEmpty()) {
                $query = DB::table('orders')->insert([
                            'user_id' =>$user,
                            'product_id'=>$cartItem['item']['id'],
                            'qty'=>$cartItem['qty'],
                            'price'=>$cartItem['price']
                        ]);
                    
                }
            else{
                foreach ($orders as $order) {
                    if ($order->product_id = $cartItem['item']['id']) {
                        $updateQty = DB::table('orders')
                        ->where('user_id',$user)
                        ->where('product_id',$cartItem['item']['id'])
                        ->update([ 'qty'=> $cartItem['qty']+$order->qty ]);
                    }else{
                        $query = DB::table('orders')->insert([
                            'user_id' =>$user,
                            'product_id'=>$cartItem['item']['id'],
                            'qty'=>$cartItem['qty'],
                            'price'=>$cartItem['price']
                        ]);
                    } 
                $sold_qty = DB::table('products')->where('id',$cartItem['item']['id'])->first();
                $slod = DB::table('products')->where('id',$cartItem['item']['id'])->update([
                    'sold_quantity'=>$sold_qty->sold_quantity + 1
                ]);  
            }
        }
    }
    unset($cart->items);
    $cart->totalPrice = 0;
    $cart->totalQty = 0 ;
    session()->put('cart', $cart);
return redirect('home');
}
}