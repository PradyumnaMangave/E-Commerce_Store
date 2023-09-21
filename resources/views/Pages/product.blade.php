@extends('layouts.master')
@section('name',$product->title)
@section('content')
    <div class="product-page">
        <div class="container">
            <div class="product-page-row">
                <section class="product-page-image">
                    <img src="{{asset( 'storage/' . $product->image)}}" alt="">
                </section>
                <section class="product-page-details">
                    <p class="p-title">{{$product->title}}</p>
                    <p class="p-price">${{$product->price/100}}</p>
                    <p class="p-category">- {{$product->category->name}}</p>
                    <p class="p-description">-{{$product->description}}</p>
                    <form action="" action="post">
                        @csrf
                        <div class="p-form">
                            <div class="p-colors">
                                <label for="color">Color</label>
                                <select name="color" id="color" required>
                                    <option value="">-- Color --</option>
                                    @foreach ($product -> colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="p-quantity">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" min="1" max="100" value="1" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn btn-cart">Add To cart</button>
                    </form>
        </div>
    </div>
@endsection