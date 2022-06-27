<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Products;
use App\Cart;
use App\WishList;
use Session;

class Details extends Controller
{
    //view the details product page 
    public function index($id)
    {
        // get product iformation  where it has the same product id
        $details = DB::table('products')
            ->where('id', $id)
            ->first();

        // categorey name and id from categories table
        $categoryName = DB::select('select a.category_name,a.category_id from categories a');
        
        // related products [with same products with same categorey]
        $relatedProducts = DB::select('
            select * from categories , products  
            where categories.category_id = products.cate_id 
            and category_id = :cate_id 
            and products.id !=:id ORDER BY RAND ()
            limit 4', ['cate_id' => $details->cate_id,'id'=>$id ]);
        
        return view('userView.productDetails', compact('details', 'id', 'categoryName','relatedProducts'));
    }
    // add item to cart function take two parameter [product id ,request'data from previous http ,retreve info like input']  
    public function getAddToCart(Request $request , $id){ 
        $data=Products::find($id);
       
        // cart before adding the product
        $oldCart = Session::has('cart') ? session::get('cart'):null;
       
        // obj for cart to add item on cart
        $cart = new Cart($oldCart);
        
        // add item to cart using obj
        $cart->add($data,$data->id);
        
        // reset the cart data
        $request->session()->put('cart', $cart);
        
        return redirect('/home');
    }
    // add product to wish list if the user is authenticated
    public function AddToWishList(Request $request ){
        if (Auth::check()){
            $productId=$request->input('product_wish_id');
            $userId=Auth::id();
            
            $wishList=WishList::all();
            // if wish list empty insert normally
            if (!WishList::exists()) {
                $query = DB::table('wish_list')->insert([
                    'id'=>null,
                    'product_id'=>$productId,
                    'user_id'=>$userId,
            ]);
                return redirect('/home');
            }
            // if its not 
             else {
                // get the wish list data where product id[same product in database] and user id [same user id that logged in] 
                $wish_list_table = DB::table('wish_list')
                ->where('product_id', $productId)
                ->where('user_id', $userId)
                ->get();
            
            if ($wish_list_table->isEmpty()) {
                $query = DB::table('wish_list')->insert([
                    'id'=>null,
                    'product_id'=>$productId,
                    'user_id'=>$userId,
                ]);
                return redirect('/home');
            }
            // if it found the product in the user wish list dont add it again
            else {
                return redirect('/home');
                }
            }
        }
        else{
            return redirect('/login');
        }
    }
}
