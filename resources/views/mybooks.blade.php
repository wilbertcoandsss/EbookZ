@extends('layout.header')

@section('title', 'Homepage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <div style="margin-left: 280px; margin-right: 280px;">
        <h1 style="font-family: 'Poppins'; font-weight: 600; ">Featured Today</h1>
        <div class="d-flex flex-row justify-content-around mt-1 mb-3">
            <img style="margin-right: 50px" class="book-pic" src="{{ Storage::url('books/' . $randomBooks->bookCover) }}">
            <div class="mb-3" style="text-align: justify;">
                <div class="title-box">
                    {{ $randomBooks->bookName }}
                </div>
                <div class="author-box">
                    {{ $randomBooks->bookAuthor }}
                </div>
                <div style="">
                    {{ $randomBooks->bookDescription }}
                </div>
                <div class="d-flex flex-row">
                    <div class="me-5">
                        <a href="/bookDetail/{{ $randomBooks->id }}">
                            <button type="button" class="mt-4 button-explore">
                                Explore Title
                            </button>
                        </a>
                    </div>
                    <div class="me-5">
                        <form action="addToCart/{{ $randomBooks->id }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-4 button-wishlist">
                                Add to my wishlist
                            </button>
                            <input type="number" name="qty" style="display: none" value="1">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h1>Continue Reading</h1>
        <div class="d-flex flex-row flex-wrap justify-content-start">
            @foreach ($readBooks as $b)
                <div class="d-flex flex-column rounded-4 rec-book" style="font-family: 'Poppins', sans-serif;">
                    <a href="/readingBookPage/{{ $b->books->id }}">
                        <div class="d-flex justify-content-center mt-1 mb-3">
                            <img class="book-pic-s" src="{{ Storage::url('books/' . $b->books->bookCover) }}">
                        </div>
                        <div class="text-center mb-3">
                            <div class="title-box" style="font-size: 20px">
                                {{ $b->books->bookName }}
                            </div>
                            <div class="author-box">
                                {{ $b->books->bookAuthor }}
                            </div>
                            <br>
                            <br>
                            <div class="genre-box mb-3 mt-3">
                                {{ $b->books->genre->genreName }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h1>Your Books</h1>
        <div class="d-flex flex-row flex-wrap justify-content-start">
            @foreach ($userBooks as $b)
                <div class="d-flex flex-column rounded-4 rec-book" style="font-family: 'Poppins', sans-serif;">
                    <a href="/readingBookPage/{{ $b->books->id }}">
                        <div class="d-flex justify-content-center mt-1 mb-3">
                            <img class="book-pic-s" src="{{ Storage::url('books/' . $b->books->bookCover) }}">
                        </div>
                        <div class="text-center mb-3">
                            <div class="title-box" style="font-size: 20px">
                                {{ $b->books->bookName }}
                            </div>
                            <div class="author-box">
                                {{ $b->books->bookAuthor }}
                            </div>
                            <br>
                            <br>
                            <div class="genre-box mb-3 mt-3">
                                {{ $b->books->genre->genreName }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    </div>

@endsection
