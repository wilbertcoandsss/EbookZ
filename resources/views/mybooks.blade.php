@extends('layout.header')

@section('title', 'Homepage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <div style="margin-left: 280px; margin-right: 280px;">
        <h1 style="font-family: 'Poppins'; font-weight: 600; ">Featured Today</h1>
        <div class="d-flex flex-row justify-content-around mt-1 mb-3">
            <img style="margin-right: 50px" class="book-pic" src="{{ Storage::url('books/' . $randomBooks->bookCover) }}">
            <div class="text-left mb-3">
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
                        <a href="#">
                            <button type="button" class="mt-4 button-explore">
                                Explore Title
                            </button>
                        </a>
                    </div>
                    <div class="me-5">
                        <a href="#">
                            <button type="button" class="mt-4 button-wishlist">
                                Add to my wishlist
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <h1>Continue Reading</h1>

        <h1>Your Books</h1>
        <div class="d-flex flex-row">
            @foreach ($books as $b)
                <div class="d-flex flex-column rounded-4 rec-book w-100" style="font-family: 'Poppins', sans-serif;">
                    <a href="">
                        <div class="d-flex justify-content-center mt-1 mb-3">
                            <img class="book-pic-s" src="{{ Storage::url('books/' . $b->bookCover) }}">
                        </div>
                        <div class="text-center mb-3">
                            <div class="title-box" style="font-size: 20px">
                                {{ $b->bookName }}
                            </div>
                            <div class="author-box">
                                {{ $b->bookAuthor }}
                            </div>
                            <br>
                            <br>
                            <div class="genre-box mb-3 mt-3">
                                {{ $b->genre->genreName }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="d-flex flex-column rounded-4 rec-book w-100" style="font-family: 'Poppins', sans-serif;">
            <a href="">
                <div class="text-center mb-3">
                    <div class="title-box" style="font-size: 20px">
                        {{ $randomBooks->bookName }}
                    </div>
                    <div class="author-box">
                        {{ $randomBooks->bookAuthor }}
                    </div>
                    <br>
                    <div class="price-box fs-5">
                        Rp. {{ $randomBooks->bookPrice }}
                    </div>
                    <br>
                    <div class="genre-box mb-3 mt-3">
                        {{ $randomBooks->genre->genreName }}
                    </div>
                </div>
            </a>
        </div> --}}
    </div>
    </div>

@endsection
