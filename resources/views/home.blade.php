@extends('layout.header')

@section('title', 'Homepage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img width="1300px" height="400px" src="{{ Storage::url('assets/Headline.png') }}" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img width="1300px" height="400px" src="{{ Storage::url('books/Charlie.jpg') }}" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img width="1300px" height="400px" src="{{ Storage::url('books/Business.jpg') }}" class="d-block w-100"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="d-flex flex-row ms-2 me-2 mt-5 justify-content-around">
        <div class="box rounded-5 ms-3 me-3">
            <div>
                <h2 style="font-family: 'Playfair Display'; font-weight: 600; color:#405969; font-size: 40px">Recommended
                    for you</h2>
                <br>
                <h4 style="font-family: 'Poppins'; font-weight: 600; font-size: 18px;">The recommended books for you, our
                    beloved Customer!
                </h4>
            </div>
            <div class="d-flex flex-row">
                @foreach ($books as $b)
                    <div class="d-flex flex-column rounded-4 rec-book w-100" style="font-family: 'Poppins', sans-serif;">
                        <a href="/bookDetail/{{$b->id}}">
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
                                <div class="price-box fs-5">
                                    Rp. {{ $b->bookPrice }}
                                </div>
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

        <div class="box rounded-5 ms-3 me-3">
            <h2>Popular in 2023</h2>
            <br>
            <h4>Here is the most popular novel back in 2023!
            </h4>
            <div class="d-flex flex-row">
                @foreach ($books as $b)
                    <div class="d-flex flex-column rounded-4 rec-book w-100" style="font-family: 'Poppins', sans-serif;">
                        <a href="">
                            <div class="d-flex justify-content-center mt-1 mb-3">
                                <img class="book-pic-s" src="{{ Storage::url('books/' . $b->bookCover) }}">
                            </div>
                            <div class="text-center mb-3">

                                {{ $b->bookName }}
                                <br>
                                Rp. {{ $b->bookPrice }}
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
    </div>

    {{-- <iframe src="{{Storage::url('pdf/Bumi.pdf')}}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe> --}}

    <div class="d-flex flex-column mt-5 mb-5 p-5 ms-5 me-5">
        <div class="d-flex w-100 justify-content-between">
            <div>
                <h2>Best Sellers</h2>
            </div>
            <div>
                <a href="">
                    View More
                </a>
            </div>
        </div>

        <div class="d-flex flex-row">
            @foreach ($books as $b)
                <div class="d-flex flex-column rounded-4 rec-book w-100 ms-3 me-3"
                    style="font-family: 'Poppins', sans-serif;">
                    <a class="d-flex flex-row w-100 justify-content-around" href="">
                        <div class="d-flex justify-content-center mt-1 mb-3">
                            <img class="book-pic" src="{{ Storage::url('books/' . $b->bookCover) }}">
                        </div>
                        <div class="text-start mb-2">
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

    <div>

    </div>
    <div class="d-flex flex-row justify-content-around info-box mt-5 mb-5 p-5 ms-5 me-5 rounded-5">
        <div class="d-flex flex-col justify-content-evenly w-100 rec-book">
            <div>
                <img src="{{ Storage::url('assets/bestValue.png') }}">
            </div>
            <div class="info-text">
                <h3>Best Value</h3>
                <h5>Lorem ipsum dolor sit amet.</h5>
            </div>
        </div>
        <div class="d-flex flex-col justify-content-evenly w-100">
            <div>
                <img src="{{ Storage::url('assets/payment.png') }}">
            </div>
            <div class="info-text">
                <h3>Secure Payment</h3>
                <h5>Lorem ipsum dolor sit amet.</h5>
            </div>
        </div>
        <div class="d-flex flex-col justify-content-evenly w-100">
            <div>
                <img src="{{ Storage::url('assets/bestQuality.png') }}">
            </div>
            <div class="info-text">
                <h3>Best Quality</h3>
                <h5>Lorem ipsum dolor sit amet.</h5>
            </div>
        </div>
        <div class="d-flex flex-col justify-content-evenly w-100">
            <div>
                <img src="{{ Storage::url('assets/247.png') }}">
            </div>
            <div class="info-text">
                <h3>24/7 Support</h3>
                <h5>Lorem ipsum dolor sit amet.</h5>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column mt-5 mb-5 p-5 ms-5 me-5">
        <div class="d-flex w-100 justify-content-between">
            <div>
                <h2>Books on Sale!</h2>
            </div>
            <div>
                <a href="">
                    View More
                </a>
            </div>
        </div>
        <div class="d-flex flex-row">
            @foreach ($books as $b)
                <div class="d-flex flex-column rounded-4 rec-book w-100 ms-3 me-3"
                    style="font-family: 'Poppins', sans-serif;">
                    <a class="d-flex  position-relative flex-row w-100 justify-content-around" href="">
                        <div class="sale-div position-absolute badge bg-warning text-dark p-2 m-3">
                            Sale!
                        </div>
                        <div class="d-flex justify-content-center mt-1 mb-3">
                            <img class="book-pic" src="{{ Storage::url('books/' . $b->bookCover) }}">
                        </div>
                        <div class="text-start mb-2">
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

    <div class="bg-promo d-flex justify-content-center flex-column">
        <div class="text-start w-50 ms-5 promo-text">
            <h1 class="mt-3 mb-5">Happy World Book Day</h1>
            <h3 class="mt-2 mb-3">SALE UP TO 50% OFF</h3>

            <h4 class="mt-5">Cop your books now!</h4>
            <a href="#">
                <button type="button" class="mt-4 button-shop">Shop Now</button>
            </a>
        </div>
    </div>

    <div class="ps-5 pe-5 pt-5 pb-5 d-flex flex-row justify-content-between" style="background-color: #637784;">
        <div>
            <h1 style="font-family: 'Poppins'; font-weight: 600; color: white;">Subscribe our newsletter
                <br>
                for newest books updates
            </h1>
        </div>
        <div class="d-flex align-items-center">
            <form class="form-inline my-2 my-lg-0 m-auto" onclick="getVal()">
                @csrf
                <input class="subscribe-bar me-3" type="email" id="email-sub" placeholder="Enter your email address">
                <button type="button" class="btn-sub" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Subscribe
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Subscription</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <span id="show-email"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="ps-5 pe-5 pt-5 pb-5" style="background: #3E3E3E;">
        <div class="footer-top d-flex flex-row justify-content-between pb-5" style="border-bottom: 1px solid #C8C8C8">
            <div class="title-footer flex-column w-50">
                <div class="mb-3">
                    <img width="182px" height="91px" src="{{ Storage::url('assets/logowhite.png') }}">
                </div>
                <div class="text-footer">
                    EbookZ Store is one of the best bookstore that currently happening in Indonesia.
                    You can buy and view books, also get a reward from us!
                </div>
            </div>
            <div class="contact-footer flex-column align-items-center">
                <div class="text-footer">
                    <h1>Contact Us</h1>
                </div>
                <div class="text-footer">
                    Service@gmail.com
                </div>
                <div class="text-footer">
                    Jl. Jalur Sutera Barat
                </div>
                <div class="text-footer">
                    +62
                </div>
            </div>
            <div class="socmed-footer align-items-end">
                <div class = "text-footer">
                    <h1>Follow Us!</h1>
                </div>
                <div class="text-footer">
                    Yes, we are on social media!
                </div>
                <div class="flex-row socmed-icon">
                    <img width="64px" height="64px" src="{{ Storage::url('assets/facebook.png') }}">
                    <img width="64px" height="64px" src="{{ Storage::url('assets/twitter.png') }}">
                    <img width="72px" height="72px" src="{{ Storage::url('assets/instagram.png') }}">
                </div>
            </div>
        </div>
        <div class="mt-5 d-flex footer-bottom align-items-center justify-content-between">
            <div class="text-footer">
                © 2023 Ebookz. All rights reserved
            </div>
            <div class="payment-icon d-flex flex-row">
                <img width="112px" height="45px" src="{{ Storage::url('assets/mandiri.png') }}">
                <img width="112px" height="45px" src="{{ Storage::url('assets/visa.png') }}">
                <img width="112px" height="45px" src="{{ Storage::url('assets/bca.png') }}">
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function genreValidation() {
            let country = document.getElementById("genre").value;

            if (country == 'newgenre') {
                document.getElementById("new-genre-form").style.display = "block";
            } else {
                document.getElementById("new-genre-form").style.display = "none";
            }
        }

        function getVal() {
            let val = document.getElementById("email-sub").value;
            console.log(val.length);
            if (val.length == 0) {
                document.getElementById("show-email").innerHTML = "Please kindly insert your email first!";
            } else if (!(val.endsWith("mail.com"))) {
                document.getElementById("show-email").innerHTML = "Please insert an email!";

            } else {
                document.getElementById("show-email").innerHTML =
                    "Thank you for subscribing ! Any updates will be informed via " + val;
            }
        }
    </script>
@endsection
