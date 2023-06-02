@extends('layout.header')

@section('title', 'Confirm Subscription')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <link rel="stylesheet" href="{{ asset('css/beforeread.css') }}">
    @if (Session::has('message'))
        <div class="alert"><img class="success-alert" src="{{ Storage::url('assets/error.png') }}">
            <h3>{{ Session::get('message') }}</h3>
        </div>
    @endif
    <div class="d-flex justify-content-center flex-column align-items-center">
        <h1 class="fw-bold mt-4">Subscription Confirmation</h1>
        <br>
        <h2 class="fw-semibold">Your subscription will be 1 month started from</h2>
        <br>
        <br>
        <h2 class="fw-bold">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now())->format('d F Y H:i:s') }}</h2>
        <br>
        <h2 class="fw-semibold">until</h2>
        <br>
        @php
            $futureDate = \Carbon\Carbon::now()->addMonth();
        @endphp
        <h2 class="fw-bold">{{ $futureDate->format('d F Y H:i:s') }}</h2>
        <br>
        <br>
        <h2 class="fw-semibold">
            Input your password to confim and buy this subscription (Rp. 150.000)
        </h2>
        <br>
        <form action="/verifySubs" method="POST">
            @csrf
            <input class="input-pw-before-read" type="password" name="password" placeholder="Enter your password">
            <input class="submit-before-read" type="submit">
        </form>
        <br>
        <br>
    </div>
@endsection
