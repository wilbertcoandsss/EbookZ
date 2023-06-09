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
        @if ($sid == 1)
            @if (Auth::user()->isSubscribe)
                <h2 class="fw-semibold">Your subscription will be 3 month started from</h2>
                <br>
                <br>
                <h2 class="fw-bold">{{ \Carbon\Carbon::parse(Auth::user()->subscribeEnd)->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">until</h2>
                <br>
                @php
                    $futureDate = \Carbon\Carbon::parse(Auth::user()->subscribeEnd)->addMonth(3);
                @endphp
                <h2 class="fw-bold">{{ $futureDate->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">
                    Input your password to confim and buy this subscription (Rp. 150.000)
                </h2>
                <br>
            @else
                <h2 class="fw-semibold">Your subscription will be 3 month started from</h2>
                <br>
                <br>
                <h2 class="fw-bold">{{ \Carbon\Carbon::now()->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">until</h2>
                <br>
                @php
                    $futureDate = \Carbon\Carbon::now()->addMonth(6);
                @endphp
                <h2 class="fw-bold">{{ $futureDate->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">
                    Input your password to confim and buy this subscription (Rp. 150.000)
                </h2>
                <br>
            @endif
        @elseif ($sid == 2)
            @if (Auth::user()->isSubscribe)
                <h2 class="fw-semibold">Your subscription will be 6 month started from</h2>
                <br>
                <br>
                <h2 class="fw-bold">{{ \Carbon\Carbon::parse(Auth::user()->subscribeEnd)->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">until</h2>
                <br>
                @php
                    $futureDate = \Carbon\Carbon::parse(Auth::user()->subscribeEnd)->addMonth(6);
                @endphp
                <h2 class="fw-bold">{{ $futureDate->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">
                    Input your password to confim and buy this subscription (Rp. 250.000)
                </h2>
                <br>
            @else
                <h2 class="fw-semibold">Your subscription will be 6 month started from</h2>
                <br>
                <br>
                <h2 class="fw-bold">{{ \Carbon\Carbon::now()->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">until</h2>
                <br>
                @php
                    $futureDate = \Carbon\Carbon::now()->addMonth(6);
                @endphp
                <h2 class="fw-bold">{{ $futureDate->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">
                    Input your password to confim and buy this subscription (Rp. 250.000)
                </h2>
                <br>
            @endif
        @elseif ($sid == 3)
            @if (Auth::user()->isSubscribe)
                <h2 class="fw-semibold">Your subscription will be 9 month started from</h2>
                <br>
                <br>
                <h2 class="fw-bold">{{ \Carbon\Carbon::parse(Auth::user()->subscribeEnd)->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">until</h2>
                <br>
                @php
                    $futureDate = \Carbon\Carbon::parse(Auth::user()->subscribeEnd)->addMonth(9);
                @endphp
                <h2 class="fw-bold">{{ $futureDate->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">
                    Input your password to confim and buy this subscription (Rp. 400.000)
                </h2>
                <br>
            @else
                <h2 class="fw-semibold">Your subscription will be 9 month started from</h2>
                <br>
                <br>
                <h2 class="fw-bold">{{ \Carbon\Carbon::now()->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">until</h2>
                <br>
                @php
                    $futureDate = \Carbon\Carbon::now()->addMonth(9);
                @endphp
                <h2 class="fw-bold">{{ $futureDate->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">
                    Input your password to confim and buy this subscription (Rp. 400.000)
                </h2>
                <br>
            @endif
        @elseif($sid == 4)
            @if (Auth::user()->isSubscribe)
                <h2 class="fw-semibold">Your subscription will be 12 month started from</h2>
                <br>
                <br>
                <h2 class="fw-bold">{{ \Carbon\Carbon::parse(Auth::user()->subscribeEnd)->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">until</h2>
                <br>
                @php
                    $futureDate = \Carbon\Carbon::parse(Auth::user()->subscribeEnd)->addMonth(12);
                @endphp
                <h2 class="fw-bold">{{ $futureDate->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">
                    Input your password to confim and buy this subscription (Rp. 550.000)
                </h2>
                <br>
            @else
                <h2 class="fw-semibold">Your subscription will be 12 month started from</h2>
                <br>
                <br>
                <h2 class="fw-bold">{{ \Carbon\Carbon::now()->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">until</h2>
                <br>
                @php
                    $futureDate = \Carbon\Carbon::now()->addMonth(6);
                @endphp
                <h2 class="fw-bold">{{ $futureDate->format('d F Y') }}</h2>
                <br>
                <h2 class="fw-semibold">
                    Input your password to confim and buy this subscription (Rp. 550.000)
                </h2>
                <br>
            @endif
        @endif
        <br>
        <form action="/verifySubs/{{ $sid }}" method="POST">
            @csrf
            <input class="input-pw-before-read" type="password" name="password" placeholder="Enter your password">
            <input class="submit-before-read" type="submit">
        </form>
        <br>
        <br>
    </div>
@endsection
