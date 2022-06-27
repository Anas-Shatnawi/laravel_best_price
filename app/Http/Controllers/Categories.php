<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class Categories extends Controller
{
    // view categories page withe all data needed
    public function index(){
        $categories=DB::table('categories')->get();
        
        return view('userView.categories',compact('categories'));
    }
    
    // view productByCategories page [show products from with same categorey]
    public function Category($id){
        $products=DB::table('products')->where('cate_id',$id)->get();
        $categoryName=DB::table('categories')->where('category_id',$id)->first();

        return view('userView.productsByCategory',compact('products','categoryName'));
    }
}
