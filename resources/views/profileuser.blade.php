@extends('layout.header')

@section('title', 'Add Book')

@section('content')

    <body>
        {{-- <link rel="stylesheet" href="{{ asset('css/addBook.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/manageMyBook.css') }}">
        <link rel="stylesheet" href="{{ asset('css/details.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">


        @if (Session::has('message'))
            <div class="alert"><img class="success-alert" src="{{ Storage::url('assets/success.png') }}">
                <h3>{{ Session::get('message') }}</h3>
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-around ms-5 mt-3 me-5 pt-3 pb-3 mb-5"
            style="background-color: white; border-radius:15px">
            <div class="d-flex flex-column" style="font-size: 22px">
                <h1>Hi, {{ Auth::user()->name }}</h1>
                <div class="d-flex flex-row align-items-center">
                    <img src="{{ Storage::url('assets/date.png') }}"
                        class="icon-prof">{{ DateTime::createFromFormat('Y-m-d H:i:s', Auth::user()->created_at)->format('d F Y') }}
                </div>
                <div class="d-flex flex-row align-items-center">
                    <img src="{{ Storage::url('assets/activeuser.png') }}" class="icon-prof">{{ Auth::user()->role }}
                </div>
                <div class="d-flex flex-row align-items-center">
                    <img src="{{ Storage::url('assets/points1.png') }}" class="icon-prof">{{ Auth::user()->points }}
                    points
                </div>
                <div class="d-flex flex-row align-items-center">
                    <img src="{{ Storage::url('assets/readtime.png') }}" class="icon-prof">{{ Auth::user()->readTime }}
                    minutes
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-column">
                <h1>Your recently opened books are</h1>
                <div class = "mt-3 mb-3">
                    @if (Auth::user()->recentOpenedBook == null)
                        <img src="{{ Storage::url('assets/nullbook.png') }}" class="icon-book-prof m-auto">
                    @else
                        <img src="{{ Storage::url('books/'.$book->bookCover) }}" class="icon-book-prof m-auto">
                    @endif
                </div>
                <div class = "d-flex align-items-center flex-column">
                    @if (Auth::user()->recentOpenedBook == null)
                        <h3>Is it null? :(</h3>
                        <h3>It means that you didnt read any book</h3>
                        <h3>Go read one!</h3>
                    @else
                        <h3>{{$book->bookName}}</h3>
                        <h3>{{$book->bookAuthor}}</h3>
                    @endif
                </div>

            </div>

        </div>

        <div class="main-form ms-5 mt-3 me-5">
            <h1>Update Profile</h1>
            <form action="/updateProfileCustomer/{{ Auth::user()->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="details-container d-flex flex-column">
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Admin Name</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="text" name="name" id="" placeholder="{{ Auth::user()->name }}">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('name')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Admin Email</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="text" name="email" id="" placeholder="{{ Auth::user()->email }}">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('email')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>

        <div class="main-form ms-5 mt-5 mb-5 me-5">
            <h1>Update Credentials</h1>
            <form action="/updateAccountCusomter/{{ Auth::user()->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="details-container d-flex flex-column">
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Old Password</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="password" name="old_pw" id="">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('old_pw')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>New Password</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="password" name="new_pw" id="">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('new_pw')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Old Password</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="password" name="confirm_pw" id="">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('confirm_pw')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <input type="submit" value="Update">
                </div>
            </form>

        </div>
    </body>
@endsection
