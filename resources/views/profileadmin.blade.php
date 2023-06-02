@extends('layout.sidebar')

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

        <div class="main-form ms-3 mt-3 me-3">
            <h1>Update Profile</h1>
            <form action="/updateProfileAdmin/{{ Auth::user()->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="details-container d-flex flex-column">
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Admin Name</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="text" name="name" id="" placeholder="{{Auth::user()->name}}">
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
                            <input type="text" name="email" id="" placeholder="{{Auth::user()->email}}">
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

        <div class="main-form ms-3 mt-3 me-3">
            <h1>Update Credentials</h1>
            <form action="/updateAccountAdmin/{{ Auth::user()->id }}" enctype="multipart/form-data" method="POST">
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

        <script type="text/javascript">
            function publisherValidation() {
                let publisher = document.getElementById("publisher").value;


                if (publisher == 'newpublisher') {
                    document.getElementById("new-publisher-form").style.display = "flex";
                    document.getElementById("myhr").style.display = "block";
                } else {
                    document.getElementById("new-publisher-form").style.display = "none";
                    document.getElementById("myhr").style.display = "none";
                }
            }

            function genreValidation() {
                let genre = document.getElementById("genre").value;


                if (genre == 'newgenre') {
                    document.getElementById("new-genre-form").style.display = "flex";
                    document.getElementById("myhr1").style.display = "block";
                } else {
                    document.getElementById("new-genre-form").style.display = "none";
                    document.getElementById("myhr1").style.display = "none";
                }
            }
        </script>
    </body>
@endsection
