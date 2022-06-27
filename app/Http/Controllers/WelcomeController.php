<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    // welcome view
    public function Welcome(){
        return view('userView.Welcome');
    }

    // home view ['/home']
    public function Home(){
        // new products
        $newProducts=DB::table('products')->orderBy('created_date','desc')->take(4)->get();
        
        // best seller
        $bestSeller=DB::table('products')->orderBy('sold_quantity','desc')->take(4)->get();
        
        // top rated
        $topRated=DB::table('products')->orderBy('rating','desc')->take(4)->get();
        
        // some categories
        $categories=DB::table('categories')->take(5)->inRandomOrder()->get();
        
        return view('userView.home',compact('newProducts','bestSeller','topRated','categories'));
    }

    // products sorted by created date
    public function NewProducts(){
        $newProducts=DB::table('products')->orderBy('created_date','desc')->get();
        return view('userView.ViewMore.newProducts',compact('newProducts'));
    }

    // product sorted by sold quantity
    public function BestSeller(){
        $bestSeller=DB::table('products')->orderBy('sold_quantity','desc')->get();
        return view('userView.ViewMore.bestSeller',compact('bestSeller'));
    }

    // product sorted by top rated
    public function TopRated(){
        $topRated=DB::table('products')->orderBy('rating','desc')->get();
        return view('userView.ViewMore.topRated',compact('topRated'));
    }
}
