use App\Models\Cart;
@extends('layouts.master')
@section('name','Cart Page')
@section('content')
    
    <header class="page-header">
        <h1>Cart</h1>
        <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
    </header>

    @if(session()->has('success'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{session()->get('success')}}
                </div>
                <div class="pop-up-actions">
                    <a href="{{route('cart')}}" class="btn btn-outlined">Continue Shopping</a>
                    <a href="{{route('cart')}}" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </section>
    @endif

    <main class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(session()->has('cart') && count(session()->get('cart')) > 0)
                        
                            @foreach (session()->get('cart') as $key =>$item)
                            <tr>
                                <td>
                                    <a href="{{route('product',$item['product']['id'])}}" class="cart-item-title">
                                        <img src="{{asset('storage/' . $item['product']['image'])}}" alt="">
                                        <p>{{$item['product']['title']}}</p>
                                    </a>
                                </td>
                                <td>{{$item['color']['name']}}</td>
                                <td>$ {{$item['product']['price']/100}}</td>
                                <td>{{$item['quantity']}}</td>
                                <td>${{App\Models\Cart::unitprice($item)}}</td>
                                <td>
                                    <form action="{{route('removeFromCart' , $key)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">X</button>
                                    </form>
                                </td>
                            @endforeach
                            <tr class="cart-total">
                                <td colspan="4" style="text-align: right;">Total</td>
                                <td>${{App\Models\Cart::totalAmount()}}</td>
                            </tr>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" class="empty-cart">Your Cart is Empty</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="cart-actions">
                <a href="{{route('checkout')}}" class="btn btn-primary">Go To Checkout</a>
            </div>
            
        </div>
    </main>

@endsection