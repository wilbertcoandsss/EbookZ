@extends('layout.sidebar')

@section('title', 'Manage Book')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/manageMyBook.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="content">
        <div class="searchProfile">
            <form action="/search" method="POST">
                @csrf
                <div class="searchBar">
                    <div class="searchLogo">
                        <img src="{{ Storage::url('assets/search-logo.png') }}" />
                    </div>
                    <input type="text" name="search">
                </div>
            </form>
        </div>
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
                </thead>
                <tbody>
                    @foreach ($books as $b)
                        <tr>
                            <td><img src="{{ Storage::url('books/' . $b->bookCover) }}" width="155px" height="180px"></td>
                            <td>{{ $b->bookName }}</td>
                            <td>Rp. {{ $b->bookPrice }}</td>
                            <td>{{ $b->bookPublishDate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script></script>
    </body>
@endsection
