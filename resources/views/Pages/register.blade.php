@extends('layouts.master')
@section('name','Register Page')
@section('content')
    <section class="login-page">
        <div class="login-form-box">
            <div class="login-title">Register</div>
            <div class="login-form">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class=" @error('name') has-error @enderror" placeholder="Enter Your Name">
                        @error('name')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class=" @error('email') has-error @enderror" placeholder="Enter Your Mail ID">
                        @error('email')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class=" @error('password') has-error @enderror" placeholder="Enter Your Password">
                        @error('password')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="field">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password" name="password_confirmation" placeholder="Confirm Your Password">
                    </div>

                    <div class="field">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                    <a href="{{route('login')}}" class="href">Already have an account? Login</a>
                </form>
            </div>
        </div>
    </section>
@endsection