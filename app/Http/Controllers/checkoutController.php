<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class checkoutController extends Controller
{
    
    public function stripeCheckout(Request $request)
    {

        $request->validate([
            'payment_method_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
        ]);
        
        Stripe::setApiKey("sk_test_51Nt6L1SE5NmV3W6ahCHcMTl0FCr11hRXxAyYJB3MEMfgmh4bihtTeF3mdFFnLljcGhw6FVwYPIGQYdGLrHXKpALE00TPNmRTle");
        
        try {
            if ($request->payment_method_id) {
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $request->payment_method_id,
                    'amount' => Cart::totalAmount() * 100,
                    'currency' => 'usd',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                    'return_url' => route('success'),
                ]);
            }
            
            if ($request->payment_intent_id) {
                $intent = \Stripe\PaymentIntent::retrieve($request->payment_intent_id);
                $intent->confirm();
            }
        } catch (\Stripe\Exception\ApiErrorException $e) {
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }
        

        //store order
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip' => $request->zip,
            'stripe_id' => $request->payment_intent_id,
            'status' => 'pending',
            'total' => Cart::totalAmount(),
        ]);

        foreach(session()->get('cart') as $item)
        {
            $order->items()->create([
                'product_id' => $item['product']['id'],
                'color_id' => $item['color']['id'],
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('cart');
        
        return route('success',['order'=> $order]);
    }
    
}