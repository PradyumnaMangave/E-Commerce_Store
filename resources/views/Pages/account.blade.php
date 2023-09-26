@extends('layouts.master')
@section('name', 'Account')
@section('content')
<div class="accounts-page">
    <div class="container">
        <section class="u-box">
            <div class="user-info">
                <p class="user-name">{{ auth()->user()->name }}</p>
                <p class="user-email">{{ auth()->user()->email }}</p>
            </div>
            <div class="user-btn">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-primary">Logout</button>
                </form>
            </div>
        </section>

        <section class="orders-box">
            <p class="order-box-title">Orders</p>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(auth()->user()->orders->count() > 0)
                        @foreach (auth()->user()->orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->items->count() }}</td>
                                <td>${{ $order->total}}</td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/y') }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center;">No Orders</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection
