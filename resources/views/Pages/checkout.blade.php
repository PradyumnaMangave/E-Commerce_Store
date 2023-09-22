    @extends('layouts.master')
    @section('name','Checkout')
    @section('content')
        
        <header class="page-header">
            <h1>Checkout</h1>
            <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
        </header>

        <main class="checkout-page">
            <div class="container">
                <div class="checkout-form">
                    <form action="" id="payment-form" method="post">
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

                    </form>
                </div>
            </div>
        </main>

    @endsection