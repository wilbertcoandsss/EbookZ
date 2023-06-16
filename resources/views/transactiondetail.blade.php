@extends('layout.header')

@section('title', 'Transaction Details')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/cartdetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trdetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    <div class="top-con">
        @php
            $TotalPrice = 0;
            $SubTotal = 0;
        @endphp
        <div class="test">
            <div class="tr-top">
                <h1>Transaction ID: {{ $thdetail->id }}</h1>
                <h1>Transaction Date: {{ $thdetail->tr_date }}</h1>
            </div>
            <h1>Customer: {{ $thdetail->users->name }}</h1>
            <table style="border-collapse: collapse">
                <thead>
                    @if ($thdetail->subsPayment)
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Sub Total</th>
                    @else
                        <th>Book Cover</th>
                        <th>Book Title</th>
                        <th>Book Price</th>
                        <th>Sub Total</th>
                    @endif
                </thead>
                <tbody>
                    @foreach ($trdetail as $td)
                        <tr>
                            @if ($thdetail->subsPayment)
                                <td>{{$td->subsName}}</td>
                                <td>{{$td->subsPrice}}</td>
                                <td>{{$td->subsPrice}}</td>
                                @php
                                    $TotalPrice = $td->subsPrice;
                                @endphp
                            @else
                                <td>
                                    <img class="book-pic-icon" src="{{ Storage::url('books/' . $td->books->bookCover) }}">
                                </td>
                                <td>{{ $td->books->bookName }}</td>
                                <td>{{ $td->books->bookPrice }}</td>
                                @php
                                    $SubTotal = $td->books->bookPrice * 1;
                                    $TotalPrice += $td->books->bookPrice * 1;
                                @endphp
                                <td>Rp. {{ $SubTotal }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="tr-bot">
                <h1>Total: Rp. {{ $TotalPrice }}</h1>
            </div>
        </div>
    </div>
@endsection
