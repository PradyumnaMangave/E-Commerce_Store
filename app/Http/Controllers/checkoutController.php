<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkoutController extends Controller
{
    
    public function stripeCheckout(Request $request){

        dd($request->all());
    }
}
