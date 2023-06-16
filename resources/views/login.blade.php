@extends('layout.header')

@section('title', 'Login Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @if (Session::has('message'))
        <div class="alert"><img class="success-alert" src="{{ Storage::url('assets/error.png') }}">
            <h3>{{ Session::get('message') }}</h3>
        </div>
    @endif
    <div class="main-login-bg" style="height: 800px;">
        <div class="center-main-login d-flex flex-column justify-content-center"
            style="margin-left: 200px; margin-right: 200px">
            <div class="d-flex flex-row justify-content-center" style="margin-top: 80px;">
                <div class="left-form d-flex justify-content-center flex-column"
                    style=" padding-left: 50px; padding-right: 40px; background-color: white; width: calc(60% - (.5em + 200px));">
                    <h1 class="text-center">Welcome Back</h1>
                    <h3 class="text-center">Please enter your credentials!</h3>
                    <div style="margin-top:55px;"></div>
                    <form action="/login" method="POST">
                        @csrf
                        <label>Email</label>
                        <br>
                        <input type="email" name="email" placeholder="Enter your email..."
                            value="{{ Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : '' }}">
                        @error('email')
                            <strong class="error-msg">{{ $message }}</strong>
                        @enderror
                        <br>
                        <label>Password</label>
                        <br>
                        <input type="password" name="password" placeholder="Enter your password...">
                        @error('password')
                            <strong class="error-msg">{{ $message }}</strong>
                        @enderror
                        <br>
                        <input type="checkbox" name="remember" id="remember" {{ Cookie::get('mycookie') !== null }}>
                        <label>Remember Me</label>
                        <br>
                        <input class="btnLogin" type="submit" value="Login">
                        <div>
                            @error('notmatch')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="right-form">
                    <img width="calc(60% - (.5em + 150px));" height="600px"
                        src="{{ Storage::url('/assets/rightside.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
