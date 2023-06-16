<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<style>
    * {
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    body{
        background: #f0ecec;
    }

    .sidebar {
        position: fixed;
        width: 100%;
        max-width: 400px;
        height: 105%;
        background: white;
        padding: 100px 0;
        border-radius: 0 10px 10px 0;
        margin-top: -120px;
    }

    .sidebar h2 {
        margin-top: 20px;
        margin-left: 63px;
    }

    .sidebar h2 logo {
        position: absolute;
    }

    .sidebar ul li {
        font-style: normal;
        font-weight: 600;
        font-size: 25px;
        line-height: 38px;
        color: #000000;
        padding: 15px 70px;
        border-bottom: 1px solid rgb(0, 0, 0, 0);
        border-top: 1px solid rgba(225, 225, 225, 0);
        transition: background 0.3s ease-in-out;
        border-radius: 0 10px 10px 0;
        margin-right: 97px;
    }

    .sidebar ul li a {
        color: #000000;
        display: block;
        text-decoration: none;
    }

    ul{
        padding-left: 0px !important;
    }

    .sidebar ul li:hover {
        background: #D2D2D2;
        margin-right: 100px;
        border-radius: 0 10px 10px 0;
    }

    .right-content {
        margin-left: 435px;
        margin-top: 100px;
    }
</style>

<body>
    <div class="sidebar">
        <h2>
            <a href = "/publisherpage">
                <img class="brand-img logo" src="{{ Storage::url('assets/logo.png') }}">
            </a>
        </h2>
        <ul>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/manageBook">Manage Book</a></li>
            <li><a href="/profilePublisher">Profile</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </div>

    <div class="right-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
</body>
