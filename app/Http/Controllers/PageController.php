<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //Home
    public function home()
    {
        $products = Product::with('category','colors')->orderBy('created_at','asc')->get();
        return view('/pages/home',['products'=>$products]);
    }


    //cart
    public function cart(){
        return view('/pages/cart');
    }

    //wish list
    public function wishlist(){
        return view('/pages/wishlist');
    }
    
    //account
    public function account(){
        return view('/pages/account');
    }
}
