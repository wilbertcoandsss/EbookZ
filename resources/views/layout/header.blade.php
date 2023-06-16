<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav-bar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ml-3 mr-5" href="#">
                <a class="navbar-brand" href="/"><img class="brand-img"
                        src="{{ Storage::url('assets/logo.png') }}"></a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: center">
                <ul class="navbar-nav d-flex justify-content-around w-100">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/mybooks">My Books</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="/library">Library</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/myMission">Mission</a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav d-flex justify-content-around w-100">
                    <form class="form-inline my-2 my-lg-0 m-auto search-bar" action="/search" method="POST">
                        @csrf
                        <button class="search-submit" type="submit"><img class="search-logo"
                                src="{{ Storage::url('/assets/search.png') }}"></button>
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
                    </form>
                </ul>
                <ul class="navbar-nav d-flex justify-content-around w-100 align-items-center">
                    @auth
                        @php
                            $cartCount = request()
                                ->session()
                                ->get('cartCounter', '');
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link" href="/subscriptionPage">Subscription</a>
                        </li>
                        <li class="d-flex nav-link align-items-center justify-content-center">
                            <a class="d-flex align-items-center justify-content-center" style="text-decoration:none"
                                href="/cartPage/{{ Auth::user()->id }}"><img src="{{ Storage::url('/assets/cart].png') }}"
                                    width="45px" height="45px" style="align-items: center">
                                <span
                                    style="position: absolute; background-color: #405969; border-radius: 15px; margin-left: 35px; margin-top: -15px; z-index: 1"
                                    class="badge">{{ $cartCount }}</span>
                            </a>
                        </li>
                        <div class="auth-container">
                            <div class="dropdown">
                                <button class="dropbtn">
                                    @if (Auth::user()->profilepic == null)
                                        @if (Auth::user()->gender == 'Male')
                                            <img class="profile-pic" src="{{ Storage::url('assets/male_avatar.png') }}">
                                        @else
                                            <img class="profile-pic" src="{{ Storage::url('assets/female_avatar.png') }}">
                                        @endif
                                    @else
                                        <img class="profile-pic" src={{ Storage::url('/') . Auth::user()->profilepic }}>
                                    @endif
                                </button>
                                <div class="dropdown-content">
                                    <div class="greetings">
                                        Hi, <strong>{{ Auth::user()->name }}</strong>
                                        <br>
                                        @if (Auth::user()->isSubscribe == true)
                                            <img class="mt-2 mb-2" src="{{ Storage::url('assets/exclusive.png') }}"
                                                width="185px" height="40px">
                                        @endif
                                    </div>
                                    <hr class="line">
                                    <a href="/profileCustomer">Your Profile</a>
                                    <a href="/transactionHistoryPage/{{ Auth::user()->id }}">Transaction History</a>
                                    <a href="/logout">Sign out</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/loginPage">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/registerPage">Sign Up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div style="margin-top: 105px;">
        @yield('content')
        @extends('layout.footer')
        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
</body>

</html>
