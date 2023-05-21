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
    <div class="test">
        <br>
        <h1 class="text-center">My Cart</h1>
        <table style="border-collapse: collapse">
            <thead>
                <th>Book Cover</th>
                <th>Book Name</th>
                <th>Book Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
                <th></th>
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
                            <td>{{ $c->book->bookPrice }}</td>
                            <td>
                                <div class="form-content-1">
                                    <div class="form-insert">
                                        <input id="priceInsert" type="number" name="qty"
                                        value = "{{$c->qty}}" min="1">
                                    </div>
                                </div>
                            </td>
                            @php
                                $subTotal = $c->book->bookPrice * $c->qty;
                                $grandTotal = $grandTotal + $subTotal;
                            @endphp
                            <td>{{ $subTotal }}</td>
                            <td>
                                <div class="submit-qty">
                                    <input type="submit" value="Update">
                                </div>
                            </td>
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
        <strong style="text-align: right; font-family: 'Poppins'; font-size: 25px;">Total Price :
            {{ $grandTotal }}</strong>
        <div class="add-book-btn">
            <a href="/checkOut/{{ Auth::user()->id }}">
                Checkout
            </a>
        </div>
    </div>
@endsection
