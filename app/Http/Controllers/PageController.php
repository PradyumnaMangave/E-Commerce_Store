<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //Home
    public function home()
    {
        return view('/pages/home');
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
