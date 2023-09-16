@extends('layouts.admin')
@section('name','Color')
@section('content')
    <h1 class="page-title">Colors</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Color</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.colors.store')}}" method="post">
                            @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" @error('name') is-invalid @enderror" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="code">Code</label>
                                    <input type="color" name="code" id="code" class="form-control" @error('code') is-invalid @enderror" value="{{old('color')}}">
                                    @error('code')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <h5>Tables</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Total Products</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                            <tr>
                                <td>{{$color->id}}</td>
                                <td>{{$color->name}}</td>
                                <td>
                                    {{$color->code}}
                                    <span style="display: inline-block; width:30px; height:30px;"></span>
                                </td>
                                <td>-</td>
                                <td>{{\Carbon\Carbon::parse($color->created_at)->format('d/m/y')}}</td>
                                <td><form action="{{route('adminpanel.colors.destroy', $color->id)}}" method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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