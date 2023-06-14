@extends('layout.sidebar')

@section('title', 'Transaction Details')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/trdetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="d-flex justify-content-between flex-column ms-2 me-5">
        @php
            $TotalPrice = 0;
            $SubTotal = 0;
        @endphp
        <div class="table-tr-admin">
            <div class="tr-top">
                <h1>Transaction ID: {{ $thdetail->id }}</h1>
                <h1>Transaction Date: {{ $thdetail->tr_date }}</h1>
            </div>
            <h1>Customer: {{ $thdetail->users->name }}</h1>
            <table style="border-collapse: collapse">
                <thead>
                    <th>Book Cover</th>
                    <th>Book Title</th>
                    <th>Book Price</th>
                    <th>Sub Total</th>
                </thead>
                <tbody>
                    @foreach ($trdetail as $td)
                        <tr>
                            <td>
                                <img width="150px" height="180px" src="{{ Storage::url('books/' . $td->books->bookCover) }}">
                            </td>
                            <td>{{ $td->books->bookName }}</td>
                            <td>{{ $td->books->bookPrice }}</td>
                            @php
                                $SubTotal = $td->books->bookPrice * 1;
                                $TotalPrice += $td->books->bookPrice * 1;
                            @endphp
                            <td>Rp. {{ $SubTotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="tr-bot">
                <h1 class = "fw-semibold">Total: Rp. {{ $TotalPrice }}</h1>
            </div>
        </div>
    </div>
@endsection
