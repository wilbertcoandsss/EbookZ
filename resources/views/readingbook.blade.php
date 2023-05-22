@extends('layout.header')

@section('title', 'Homepage')

@section('content')
    <form action="/mybooks" method="get">
        @csrf
        <button type="submit">Back</button>
    </form>
    <embed src="{{ Storage::url('pdf/' . $book->bookPdf).'#toolbar=0' }}" type="application/pdf" width="100%" height="1080px">
@endsection
