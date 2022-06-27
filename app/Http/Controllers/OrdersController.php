<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class OrdersController extends Controller
{
    public function index(){
        $user = Auth::id();

        // $orders = DB::table('orders')->where('user_id',$user);
        
        $products = DB::table('products')
            ->join('orders', 'orders.product_id', '=', 'products.id')
            ->select('products.*', 'orders.user_id','orders.qty')
            ->where('orders.user_id','=',$user)
            ->get();
        
        return view('userView.orders',compact('products'));
    }
}
