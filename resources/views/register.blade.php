@extends('layout.header')

@section('title', 'Register Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div class="main-login-bg" style="height: 980px;">
        <div class="center-main-login d-flex flex-column justify-content-center"
            style="margin-left: 200px; margin-right: 200px">
            <div class="d-flex flex-row justify-content-center" style="margin-top: 80px;">
                <div class="left-form d-flex justify-content-center flex-column"
                    style=" padding-left: 50px; padding-right: 40px; background-color: white; width: calc(60% - (.5em + 200px));">
                    <h1 class="text-center">Hi there!</h1>
                    <h3 class="text-center">Register your account below!</h3>
                    <div style="margin-top:35px;"></div>
                    <form action="/register" method="POST">
                        @csrf
                        <label>Name</label>
                        <br>
                        <input type="text" name="name" placeholder="Enter your name...">
                        @error('name')
                            <strong class="error-msg">{{ $message }}</strong>
                        @enderror
                        <br>
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
                        <label>Gender</label>
                        <div class="d-flex w-100">
                            <input class="me-1" id="maleInsert" type="radio" name="gender" value="Male"
                                {{ old('gender') == 'Male' ? 'checked' : '' }}>Male
                            <input class="ms-5 me-1" id="femaleInsert" type="radio" name="gender" value="Female"
                                {{ old('gender') == 'Female' ? 'checked' : '' }}>Female
                        </div>
                        @error('gender')
                            <strong class="error-msg">{{ $message }}</strong>
                        @enderror
                        <br>
                        <label for="dobInsert">Date Of Birth</label>
                        <br>
                        <input id="dobInsert" type="date" name="dob" value="date" placeholder="Input your DOB..">
                        @error('dob')
                            <strong class="error-msg">{{ $message }}</strong>
                        @enderror
                        <input class="btnRegister" type="submit" value="Register">
                        <div>
                            @error('notmatch')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="right-form">
                    <img width="calc(60% - (.5em + 150px));" height="830px"
                        src="{{ Storage::url('/assets/rightside.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
