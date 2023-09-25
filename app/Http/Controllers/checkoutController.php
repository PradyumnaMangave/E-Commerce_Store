<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class checkoutController extends Controller
{
    
    public function stripeCheckout(Request $request){
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
        

        
        return redirect()-> route('success');
    }
    
}