<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //Home
    public function home()
    {
        //return view('/pages/home');
        return view('/pages/home', ['name' => 'Pradyumna']);
    }


    //cart
    public function cart(){
        return view('/pages/cart');
    }
}
