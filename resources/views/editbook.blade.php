@extends('layout.sidebar')

@section('title', 'Edit Book')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/manageMyBook.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <ul class="navbar-nav w-100">
        <form class="form-inline search-bar-1" style=""  action="/search" method="POST">
            @csrf
            <button class="search-submit" type="submit"><img class="search-logo"
                    src="{{ Storage::url('/assets/search.png') }}"></button>
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name = "search">
        </form>
    </ul>
    <div class="content">
        <div class="menu d-flex justify-content-start ms-2" style="margin-top: 50px">
            <li class="ab"><a href="/manageBook">All Books</a></li>
            <li class="ab"><a href="/addBookPage">Add Book</a></li>
            <li class="ab"><a class="text-decoration-underline" href="">Edit Book</a></li>
        </div>
    </div>

    @if (Session::has('message'))
        <div class="alert"><img class="success-alert" src="{{ Storage::url('assets/success.png') }}">
            <h3>{{ Session::get('message') }}</h3>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-column ms-2 me-5">
        <br>
        <br>
        <h2 class="fw-bold text-center">Edit Book</h2>
        <div class="table-tr-admin">
            <table style="border-collapse: collapse">
                <thead>
                    <th>Book Cover</th>
                    <th>Book Name</th>
                    <th>Book Price</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    @foreach ($books as $b)
                        <tr>
                            <td><img src="{{ Storage::url('books/' . $b->bookCover) }}" width="155px" height="180px"></td>
                            <td>{{ $b->bookName }}</td>
                            <td>Rp. {{ $b->bookPrice }}</td>
                            <td>
                                <form action="/updateBookDetail/{{ $b->id }}" method="GET">
                                    @csrf
                                    <input class="btnact" type="submit" value="Update">
                                </form>
                            </td>
                            <td>
                                <form action="/deleteBook/{{ $b->id }}" method="POST">
                                    @csrf
                                    <input class="btnactdel" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script></script>
    </body>
@endsection
