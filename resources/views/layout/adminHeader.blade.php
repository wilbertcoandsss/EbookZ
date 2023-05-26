<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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

    /* sidebar */
    body {
        background: #EEEEEE;
        display: flex;
    }

    .sidebar {
        position: fixed;
        width: 100%;
        max-width: 400px;
        height: 100%;
        background: #FFFFFF;
        padding: 100px 0;
        border-radius: 0 10px 10px 0;
    }

    .sidebar h2 {
        margin-top: -130px;
        padding: 70px 69px;
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
    }

    .sidebar ul li:hover {
        background: #D2D2D2;
        margin-right: 97px;
        border-radius: 0 10px 10px 0;
    }
</style>

<body>
    <div class="sidebar">
        <h2>
            <img class="logo" src="fotomanagemybook/EbookZ.png" alt="logoebookz">
        </h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Manage Book</a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>

    @yield('content')
    @extends('layout.footer')
</body>
