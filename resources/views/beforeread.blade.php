@extends('layout.header')

@section('title', 'Cartpage')

@section('content')
<link rel="stylesheet" href="{{ asset('css/beforeread.css') }}">
    @if (Session::has('message'))
        <div class="alert"><img class="success-alert" src="{{ Storage::url('assets/error.png') }}">
            <h3>{{ Session::get('message') }}</h3>
        </div>
    @endif
<div class="d-flex justify-content-center flex-column align-items-center">
    <h1 class="fw-bold">Hold On!</h1>
    <br>
    <h2 class="fw-semibold">Before you accessing these books</h2>
    <br>
    <img src = "{{Storage::url('books/'. $book->bookCover)}}" width="350px" height="380px">
    <br>
    <h3 class = "fw-semibold">{{$book->bookName}}</h3>
    <br>
    <h2 class="fw-semibold">Please enter your password just to make sure its you!</h2>
    <br>
    <form action="/verifyPw/{{$book->id}}" method="POST">
        @csrf
        <input class = "input-pw-before-read"
        type="password" name = "password" placeholder="Enter your password">
        <input class = "submit-before-read" type="submit">
    </form>
    <br>
    <br>
</div>
@endsection
