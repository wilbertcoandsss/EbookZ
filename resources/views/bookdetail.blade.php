@extends('layout.header')

@section('title', 'Homepage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    @foreach ($bookDetail as $b)
        <div style="margin-left: 280px; margin-right: 280px;">
            <h1 style="font-family: 'Poppins'; font-weight: 600; ">Overviews</h1>
            <div style="margin-top: 40px;"></div>
            <div class="d-flex flex-row justify-content-center mt-1 mb-3 align-items-center">
                <img style="margin-right: 50px" class="book-pic-detail" src="{{ Storage::url('books/' . $b->bookCover) }}">
                <div class="text-left mb-3">
                    <div class="title-box">
                        {{ $b->bookName }}
                    </div>
                    <div class="author-box">
                        {{ $b->bookAuthor }}
                    </div>
                    <div
                        style="text-align: justify; color: rgba(0, 0, 0, 0.5); font-weight: 600;
                    font-size: 16px;">
                        {{ $b->bookDescription }}
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="price-box d-flex fs-5 align-items-center">
                            Rp. {{ $b->bookPrice }}
                        </div>
                        <form action="/addToCart/{{ $b->id }}" method="POST">
                            <div class="addtocart">
                                @csrf
                                <input type="submit" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <br>
                    @if (Auth::user() && Auth::user()->isSubscribe)
                        <div>
                            <form action="/beforeReadPage/{{ $b->id }}" method="GET">
                                <button type="submit" class="read-now-btn">Read Now [Exclusive]</button>
                            </form>
                        </div>
                    @else
                    @endif
                </div>
            </div>
            <div style="margin-top: 40px;"></div>
            <h1 style="font-family: 'Poppins'; font-weight: 600; ">Details</h1>
            <div style="margin-top: 35px;"></div>
            <div class="details-container d-flex flex-column">
                <hr>
                <div class="details-box d-flex flex-row align-items-center">
                    <h5>BOOK TITLE</h5>
                    <h6>{{ $b->bookName }}</h6>
                </div>
                <hr>
                <div class="details-box d-flex flex-row align-items-center">
                    <h5>AUTHOR</h5>
                    <h6>{{ $b->bookAuthor }}</h6>
                </div>
                <hr>
                <div class="details-box d-flex flex-row align-items-center">
                    <h5>PUBLISHER</h5>
                    <h6>{{ $b->publisher->publisherName }}</h6>
                </div>
                <hr>
                <div class="details-box d-flex flex-row align-items-center">
                    <h5>ISBN</h5>
                    <h6>{{ $b->ISBN }}</h6>
                </div>
                <hr>
                <div class="details-box d-flex flex-row align-items-center">
                    <h5>DATE PUBLISHED</h5>
                    <h6>{{ $b->bookPublishDate }}</h6>
                </div>
                <hr>
                <div class="details-box d-flex flex-row align-items-center">
                    <h5>PAGES</h5>
                    <h6>{{ $b->bookPage }}p.</h6>
                </div>
                <hr>
                <div class="details-box d-flex flex-row align-items-center">
                    <h5>STOCK</h5>
                    <h6>{{ $b->bookStock }}</h6>
                </div>
                <hr>
                <div class="details-box d-flex flex-row align-items-center">
                    <h5>GENRE</h5>
                    <h6>{{ $b->genre->genreName }}</h6>
                </div>
                <hr>
            </div>

            <div style="margin-bottom: 80px;"></div>
        </div>
    @endforeach
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
    <script>
        $("#qty").keypress(function(evt) {
            evt.preventDefault();
        });

        $(document).keydown(function(e) {
            var elid = $(document.activeElement).hasClass('textInput');
            console.log(e.keyCode + ' && ' + elid);
            //prevent both backspace and delete keys
            if ((e.keyCode === 8 || e.keyCode === 46) && !elid) {
                return false;
            };
        });

        function decreaseQty() {
            var qtyInput = document.getElementById('qtyInput');
            var currentQty = parseInt(qtyInput.value);

            if (currentQty > 1) {
                currentQty--;
                qtyInput.value = currentQty;
            }
        }

        function increaseQty() {
            var qtyInput = document.getElementById('qtyInput');
            var currentQty = parseInt(qtyInput.value);

            currentQty++;
            qtyInput.value = currentQty;
        }
    </script>
@endsection
