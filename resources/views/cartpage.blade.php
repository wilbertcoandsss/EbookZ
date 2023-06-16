@extends('layout.header')

@section('title', 'Cartpage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/cartdetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    @php
        $subTotal = 0;
        $grandTotal = 0;
    @endphp
    @if (Session::has('message'))
        <div class="alert"><img class="success-alert" src="{{ Storage::url('assets/success.png') }}">
            <h3>{{ Session::get('message') }}</h3>
        </div>
    @endif

    @if(!$cart->isEmpty())
    <div class="test">
        <br>
        <h1 class="text-center">My Cart</h1>
        <table style="border-collapse: collapse">
            <thead>
                <th>Book Cover</th>
                <th>Book Name</th>
                <th>Book Price</th>
                <th>Subtotal</th>
                <th style="text-align: center">Action</th>
                {{-- <th></th> --}}
            </thead>
            <tbody>
                @foreach ($cart as $c)
                    <form action="/updateQty/{{ $c->id }}" method="POST">
                        @csrf
                        <tr>
                            <td>
                                <img class="book-pic-icon" src="{{ Storage::url('books/' . $c->book->bookCover) }}">
                            </td>
                            <td>{{ $c->book->bookName }}</td>
                            <td>Rp. {{ $c->book->bookPrice }}</td>
                            @php
                                $subTotal = $c->book->bookPrice * 1;
                                $grandTotal = $grandTotal + $subTotal;
                            @endphp
                            <td>Rp. {{ $subTotal }}</td>
                            <td>
                                <div class="remove-cart">
                                    <a href="/deleteCart/{{ $c->id }}">Remove</a>
                                </div>
                            </td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure want to checkout all these books ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style = "background-color: gainsboro; color: black" data-bs-dismiss="modal">Back</button>
                        <form action = "/checkOut/{{Auth::user()->id}}" method="GET">
                            <button type="submit" class="btn" style="background-color: #405969; color:white">Checkout</button>
                        </form>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <strong style="text-align: right; font-family: 'Poppins'; font-size: 25px;">Total Price :
            Rp. {{ $grandTotal }}</strong>
        <div class="add-book-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            {{-- /checkOut/{{ Auth::user()->id }} --}}
            <button>
                Checkout
            </button>
        </div>
    </div>
    @else
    <div class="d-flex flex-column justify-content-center text-center mt-5 mb-5">
        <h1>You have no ongoing cart at the moment...</h1>
        <br>
        <br>
        <h1><a href = "/">Go Find One!</a></h1>
    </div>
    @endif
@endsection
