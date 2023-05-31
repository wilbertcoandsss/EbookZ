@extends('layout.sidebar')

@section('title', 'Admin Page')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-column" style="padding-top: 170px;">
        <h1>Hi, {{Auth::user()->name}}!</h1>
        <br>
        <h1>Welcome to EbookZ Publisher Page!</h1>
        <br>
        <h1>You can manage your book here!</h1>
    </div>
@endsection
