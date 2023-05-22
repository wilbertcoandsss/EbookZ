@extends('layout.header')

@section('title', 'Homepage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/cartdetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trdetail.css') }}">
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
                    <th>Game Title</th>
                    <th>Game price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </thead>
                <tbody>
                    @foreach ($trdetail as $td)
                        <tr>
                            <td>{{ $td->books->bookName }}</td>
                            <td>{{ $td->books->bookPrice }}</td>
                            <td>{{ $td->qty }}</td>
                            @php
                                $SubTotal = $td->books->bookPrice * $td->qty;
                                $TotalPrice += $td->books->bookPrice * $td->qty;
                            @endphp
                            <td>${{ $SubTotal}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="tr-bot">
                <h1>Total: ${{ $TotalPrice }}</h1>
            </div>
        </div>
    </div>
@endsection
