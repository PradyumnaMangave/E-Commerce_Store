@extends('layouts.master')
    @section('name','Checkout')
    @section('head')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{('js/checkout.js')}}"></script>
    <style>
        .StripeElement {
            height: 20px;
            padding: 10px 12px;
            width: 100%;
            color: #32325d;
            background-color: white;
            border: 1px solid transparent;
            border-radius: 4px;

            box-shadow: 0 1px 3px 0 #e6ebf1; 
            -webkit-transition: box-shadow 150ms ease; 
            transition: box-shadow 150ms ease;
            margin-bottom: 20px
        }
        
        .StripeElement-focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        
        .StripeElement-invalid { 
            border-color: #fa755a;
        }
        
        .StripeElement-webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
    @endsection
    @section('content')
        <header class="page-header">
            <h1>Checkout</h1>
            <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
        </header>

        <main class="checkout-page">
            <div class="container">
                <div class="checkout-form">
                    <form action="{{route('stripeCheckout')}}" id="payment-form" method="post">
                        @csrf
                        <div class="field">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class=" @error('name') has-error @enderror" placeholder="Enter Your Name" value="{{old('name') ? old('name') : auth()->user()->name}}">
                            @error('name')
                            <span class="field-error">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class=" @error('email') has-error @enderror" placeholder="Enter Your Email" value="{{old('email') ? old('email') : auth()->user()->email}}">
                            @error('email')
                            <span class="field-error">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class=" @error('phone') has-error @enderror" placeholder="Enter Your Mobile Number" value="{{old('phone') ? old('phone') : auth()->user()->phone}}">
                            @error('phone')
                            <span class="field-error">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="country">Country</label>
                            <select name="country" id="country">
                                <option value="">-- Select Country --</option>
                                <option value="India">India</option>
                            </select>
                            @error('country')
                            <span class="field-error">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" class=" @error('state') has-error @enderror" placeholder="Enter Your State" value="{{old('state')}}">
                            @error('state')
                            <span class="field-error">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class=" @error('city') has-error @enderror" placeholder="Enter Your City" value="{{old('city')}}">
                            @error('city')
                            <span class="field-error">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="zip">Zip Code</label>
                            <input type="text" id="zip" name="zip" class=" @error('zip') has-error @enderror" placeholder="Enter Your Zip Code" value="{{old('zip')}}">
                            @error('zip')
                            <span class="field-error">{{$message}}</span>
                            @enderror
                        </div>

                        <input type="hidden" name="payment_method_id" id="payment_method_id" value="">
                        
                        <label>
                            Card Details
                            <div id="card-element"></div>
                        </label>
                        <button type="submit" class="btn btn-block btn-primary">Submit Payment</button>

                    </form>
                </div>
            </div>
        </main>


        <script>
        var stripe = Stripe('pk_test_51Nt6L1SE5NmV3W6aalsweEahO0wyzRpHPfSQmA1B5pTMbaa5PDPLsUpIjMl4IVanub2iLw4NMxgoX0tFHnoKzQNZ00BPieKQ4O');
        var elements = stripe.elements();
        // Set up Stripe.js and Elements to use in checkout for
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                color: "#aab7c4"
                }
            },
            
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            },
        };
        var cardElement = elements.create('card', {style: style});
        cardElement.mount('#card-element');
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            // We don't want to let default form submission happen here,
            // which would refresh the page.
            event.preventDefault();
            
            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    // Include any additional collected billing details.
                    name: 'Test Name',
                },
            }).then(stripePaymentMethodHandler);
        });
        
        function stripePaymentMethodHandler(result) {
            if (result.error) {

            } else {
            document.getElementById('payment_method_id').value=  result.paymentMethod.id
            form.submit();
            }
        }

</script>
    @endsection