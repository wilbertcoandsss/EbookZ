@extends('layout.header')

@section('title', 'Subscription Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/missions.css') }}">
    @php
        use Carbon\Carbon;
        $subscribeStart = \Carbon\Carbon::now();
        $subscribeEnd = \Carbon\Carbon::parse(Auth::user()->subscribeEnd);
        $daysDifference = $subscribeStart->diffInDays($subscribeEnd);
    @endphp
    @if (Session::has('message'))
        <div class="alert"><img class="success-alert" src="{{ Storage::url('assets/success.png') }}">
            <h3>{{ Session::get('message') }}</h3>
        </div>
    @endif
    <div style="margin-left: 55px; margin-right: 55px;">
        <h1 class="text-center mt-5">Subscription Page</h1>
        <div class="top-container mt-5">
            <div class="d-flex align-items-center justify-content-center flex-column">
                <br>
                @if (Auth::user()->isSubscribe)
                    <h1 class="fw-semibold">Hi, {{ Auth::user()->name }}</h1>
                    <br>
                    <img class="mt-2 mb-2" src="{{ Storage::url('assets/exclusive.png') }}" width="185px" height="40px">
                    <br>
                    <h4 class="fw-semibold">Active from :
                        {{ DateTime::createFromFormat('Y-m-d', Auth::user()->subscribeStart)->format('d F Y') }}</h4>
                    <br>
                    <h4 class="fw-semibold">End subscription:
                        {{ DateTime::createFromFormat('Y-m-d', Auth::user()->subscribeEnd)->format('d F Y') }}</h4>
                    <br>
                    <h4 class="fw-semibold">{{ $daysDifference }} day(s) left</h4>
                    <br>
                    <h2>Wants to extend your subcription?</h2>
                @else
                    <h2 class="text-center">Starts from Rp.150.000, you will have access to ALL BOOKS without buying them for 3 months!</h2>
                    <br>
                    <h2>So what are you waiting for?</h2>
                    <br>
                    <h2>Choose your plan now!</h2>
                @endif
                <br>
                <br>
                <div class="d-flex flex-row justify-content-around w-100">
                    <div>
                        <form action="/confirmSubscribe/1" method="GET">
                            <button type="submit" class="subscribe-btn">
                                <h4>3 Months</h4>
                                <h4>Rp. 150.000</h4>
                            </button>
                        </form>
                    </div>
                    <div>
                        <form action="/confirmSubscribe/2" method="GET">
                            <button type="submit" class="subscribe-btn">
                                <h4>6 Months</h4>
                                <h4>Rp. 250.000</h4>
                            </button>
                        </form>
                    </div>
                    <div>
                        <form action="/confirmSubscribe/3" method="GET">
                            <button type="submit" class="subscribe-btn">
                                <h4>9 Months</h4>
                                <h4>Rp. 400.000</h4>
                            </button>
                        </form>
                    </div>
                    <div>
                        <form action="/confirmSubscribe/4" method="GET">
                            <button type="submit" class="subscribe-btn">
                                <h4>12 Months</h4>
                                <h4>Rp. 550.000</h4>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
