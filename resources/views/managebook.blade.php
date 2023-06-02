@extends('layout.sidebar')

@section('title', 'Manage Book')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/manageMyBook.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <ul class="navbar-nav w-100">
        <form class="form-inline search-bar-1" action="/search" method="POST">
            @csrf
            <button class="search-submit" type="submit"><img class="search-logo"
                    src="{{ Storage::url('/assets/search.png') }}"></button>
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name = "search">
        </form>
    </ul>
    <div class="content">
        <div class="menu d-flex justify-content-start ms-2" style="margin-top: 50px">
            <li class="ab"><a class="text-decoration-underline" href="">All Books</a></li>
            <li class="ab"><a href="/addBookPage">Add Book</a></li>
            <li class="ab"><a href="/editBookPage">Edit Book</a></li>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-column ms-2 me-5">
        <br>
        <br>
        <h2 class="fw-bold text-center">All Books</h2>
        <div class="table-tr-admin">
            <table style="border-collapse: collapse">
                <thead>
                    <th>Book Cover</th>
                    <th>Book Name</th>
                    <th>Book Price</th>
                    <th>Publish Date</th>
                    <th>Discount</th>
                </thead>
                <tbody>
                    @foreach ($books as $b)
                        <tr>
                            <td><img src="{{ Storage::url('books/' . $b->bookCover) }}" width="155px" height="180px"></td>
                            <td>{{ $b->bookName }}</td>
                            <td>Rp. {{ $b->bookPrice }}</td>
                            <td>{{ $b->bookPublishDate }}</td>
                            <td>
                                @if($b->isDiscount == 1)
                                    Discount
                                @else
                                    Normal
                                @endif
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
