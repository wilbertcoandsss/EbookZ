@extends('layout.header')

@section('title', 'Homepage')

@section('content')
<link rel="stylesheet" href="{{ asset('css/beforeread.css') }}">
    <form class = "d-flex justify-content-center align-items-center"action="/mybooks" method="get">
        @csrf
        <button class = "sub-reading-book-page"type="submit">Back</button>
    </form>
    <embed src="{{ Storage::url('pdf/' . $book->bookPdf).'#toolbar=0' }}" type="application/pdf" width="100%" height="1080px">
@endsection
