@extends('layouts.master')
@section('name','Success')
@section('content')
    
    <header class="page-header">
        <h1>Order Successfully Placed</h1>
    </header>

    <section class="page-success">
        <div class="container">
            <h1>Your Order Has Been Placed Successfully...</h1>
            <h2>Your Order ID is: {{$order->id}}</h2>
        </div>
    </section>

@endsection