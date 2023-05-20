@extends('layout.header')

@section('title', 'Homepage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @php
        $totalQty = 0;
    @endphp
    @foreach ($bookDetail as $b)
        <div style="margin-left: 280px; margin-right: 280px;">
            <h1>Book Details</h1>
            <div class="d-flex flex-row justify-content-between mt-1 mb-3">
                <img style="margin-right: 50px" class="book-pic" src="{{ Storage::url('books/' . $b->bookCover) }}">
                <div class="text-left mb-3">
                    <div class="title-box">
                        {{ $b->bookName }}
                    </div>
                    <div class="author-box">
                        {{ $b->bookAuthor }}
                    </div>
                    <div style="text-align: justify">
                        {{ $b->bookDescription }}
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="price-box d-flex fs-5 align-items-center">
                            Rp. {{ $b->bookPrice }}
                        </div>
                        <div class="d-flex flex-row justify-content-between" style="width: 230px">
                            <div class = "qtyOuter">
                                <button class = "qtyBtn" onclick="decreaseQty()">-</button>
                                <input type="number" id = "qtyInput" name="qty" value="1" disabled="true">
                                <button class = "qtyBtn" onclick="increaseQty()">+</button>
                            </div>
                            <div class = "addtocart">
                                <form action="" method="POST">
                                    @csrf
                                    <input type="submit" value="Add to Cart">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
