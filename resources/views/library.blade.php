@extends('layout.header')

@section('title', 'Library')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/library.css') }}">

    <main class="mt-5 mb-5 ms-5 me-5">
        <section class="row align-items-center justify-content-center">
            <div class="col-4">
                <div class="p-2 header1">
                    <h1>New & Trending</h1>
                </div>
                <div class="p-2 desc">Get to know the books everyone loves and read right now!</div>
            </div>
            <div class="col-8">
                <div class="text-center p-2">
                    <img src="{{ Storage::url('assets/libraryIcon.jpg') }}" style="width: 450px; height: 550px;" />
                </div>
            </div>
        </section>

        <!-- Featured Categories -->
        <section>
            <div class="row justify-content-between d-flex flex-row align-items-center g-2 mb-5">
                <div class="col header2">
                    <h1>Featured Categories</h1>
                </div>
                <form action="/library" method="GET">
                    @csrf
                    <button class="genre-data-1" type="submit" class="text-center desc">
                        View All Categories
                    </button>
                </form>
            </div>
            <div class="row justify-content-around align-items-center g-2">
                @foreach ($genre as $g)
                    <div class="col">
                        <div class="text-center">
                            <span class="fa-stack fa-2x">
                                <i class="fa-solid fa-circle fa-stack-2x" style="color: #DEDEDE;"></i>
                                <i class="fas fa-user-secret fa-stack-1x fa-inverse" style="color: #bb86fc;"></i>
                            </span>
                        </div>

                        <form action="/filterData/{{ $g->id }}" method="POST"
                            class="d-flex justify-content-around text-center desc">
                            @csrf
                            <button class="genre-data" type="submit" class="text-center desc">
                                {{ $g->genreName }}
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="d-flex flex-row flex-wrap justify-content-around">
                @foreach ($books as $b)
                    <div class="d-flex flex-column rounded-4 rec-book w-10"
                        style="font-family: 'Poppins', sans-serif; width: 20%">
                        <a href="/bookDetail/{{ $b->id }}">
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
        </section>

        <section>
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img width="50px" height="550px" src="{{ Storage::url('books/' . $bestseller[0]->bookCover) }}"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block lbl-carousel">
                            <h5>{{ $bestseller[0]->bookName }}</h5>
                            <p>{{ $bestseller[0]->bookDescription }}</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img width="50px" height="550px" src="{{ Storage::url('books/' . $bestseller[1]->bookCover) }}"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block lbl-carousel">
                            <h5>{{ $bestseller[1]->bookName }}</h5>
                            <p>{{ $bestseller[1]->bookDescription }}</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img width="50px" height="550px" src="{{ Storage::url('books/' . $bestseller[2]->bookCover) }}"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block lbl-carousel">
                            <h5>{{ $bestseller[2]->bookName }}</h5>
                            <p>{{ $bestseller[2]->bookDescription }}</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <div class="d-flex flex-column mt-5 mb-5 p-5 ms-5 me-5">
            <div class="d-flex w-100 justify-content-between">
                <div>
                    <h2 class="fw-bold">Books on Sale!</h2>
                    <h3 class="fw-semibold"> Explore our exclusive collection of discounted books from the amazing
                        publishers. Uncover literary gems and
                        indulge in captivating stories at unbeatable prices. Shop now and ignite your passion for reading!
                    </h3>
                </div>
            </div>
            <div class="d-flex flex-row">
                @foreach ($bookSales as $b)
                    <div class="d-flex flex-column rounded-4 rec-book w-100 ms-3 me-3"
                        style="font-family: 'Poppins', sans-serif;">
                        <a class="d-flex  position-relative flex-row w-100 justify-content-around"
                            href="/bookDetail/{{ $b->id }}">
                            <div class="sale-div position-absolute badge bg-warning text-dark p-2 m-3">
                                Sale!
                            </div>
                            <div class="d-flex justify-content-center mt-1 mb-3">
                                <img class="book-pic" src="{{ Storage::url('books/' . $b->bookCover) }}">
                            </div>
                            <div class="text-start mb-2 ms-3">
                                <div class="genre-box mb-3 mt-3 text-center">
                                    {{ $b->genre->genreName }}
                                </div>
                                <div class="title-box">
                                    {{ $b->bookName }}
                                </div>
                                <div class="author-box">
                                    {{ $b->bookAuthor }}
                                </div>
                                <br>
                                <br>
                                <div class="price-box">
                                    Rp. {{ $b->bookPrice }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </main>
@endsection
