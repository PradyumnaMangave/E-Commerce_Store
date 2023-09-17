@extends('Layouts.admin')
@section('name','Products')
@section('content')
<h1 class="page-title">Products</h1>
<div class="container">
<a href="{{route('adminpanel.products.create')}}" class="btn btn-primary">+ &nbsp; Create Product</a>

<div class="row">
            <div class="col-12">
                <div class="card-header">
                    <h5>Products</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Colors</th>
                                <th>Image</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>{{\Carbon\Carbon::parse($product->created_at)->format('d/m/y')}}</td>
                                <td>{{--  <form action="{{route('adminpanel.colors.destroy', $color->id)}}" method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection