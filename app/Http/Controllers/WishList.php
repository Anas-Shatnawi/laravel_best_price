<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class WishList extends Controller
{
    // view wish list if user is authenticated
    public function getWishList(){
        if (Auth::check()) {
            $userId = Auth::id();
            
            $wish_list=DB::table('products')
                ->join('wish_list', 'products.id', '=', 'wish_list.product_id')
                ->where('wish_list.user_id', $userId)
                ->select('products.*', 'wish_list.user_id','wish_list.id as wish_id')
                ->get();
    
            return  view('userView.wishList',compact('wish_list'));
        }
        else{
            return  view('userView.wishList',['wish_list'=>null]);
        }
    }
    // delete item from wish list
    public function deleteItem($id){

        $wish_list=DB::table('wish_list')
        ->where('id',$id)
        ->delete();

        return response()->json([
            'success' => 'Item Removed From Your WishList  Successfully !!!'
        ]);        
    }
}
