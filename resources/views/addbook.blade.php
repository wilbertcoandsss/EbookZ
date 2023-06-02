@extends('layout.sidebar')

@section('title', 'Add Book')

@section('content')

    <body>
        {{-- <link rel="stylesheet" href="{{ asset('css/addBook.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/manageMyBook.css') }}">
        <link rel="stylesheet" href="{{ asset('css/details.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        
        <div class="content">
            <div class="menu d-flex justify-content-start ms-2" style="margin-top: 50px">
                <li class="ab"><a href="/manageBook">All Books</a></li>
                <li class="ab"><a class="text-decoration-underline" href="">Add Book</a></li>
                <li class="ab"><a href="/editBookPage">Edit Book</a></li>
            </div>
        </div>

        @if (Session::has('message'))
            <div class="alert"><img class="success-alert" src="{{ Storage::url('assets/success.png') }}">
                <h3>{{ Session::get('message') }}</h3>
            </div>
        @endif
        <div class="main-form ms-3 mt-3 me-3">
            <h1>Insert New Book</h1>
            <form action="/addBook" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="details-container d-flex flex-column">
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Book Cover</h4>
                            {{-- <h6>{{ $b->bookName }}</h6> --}}
                            <input type="file" name="cover">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('cover')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Book Name</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="text" name="name" id="">
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
                            <h4>Book Author</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="text" name="author" id="">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('author')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Book Price</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="number" name="price" id="">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('price')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Book Description</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <textarea name="description"></textarea>
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('description')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Book Publish Date</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="date" name="date" id="">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('date')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Book Page</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="number" name="page" id="">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('page')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>ISBN</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="number" name="isbn">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('isbn')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center">
                            <h4>Book PDF</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <input type="file" name="pdf" id="">
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('pdf')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex flex-column">
                        <div class="details-box d-flex flex-row align-items-center" oninput="publisherValidation()">
                            <h4>Book Publisher</h4>
                            {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                            <select id="publisher" name="publisher">
                                @foreach ($publisher as $p)
                                    <option value={{ $p->publisherName }}>{{ $p->publisherName }}</option>
                                @endforeach
                                <option value="newpublisher">Add New Publisher</option>
                            </select>
                        </div>
                        <br>
                        <div class="error-msg">
                            @error('new_publisher')
                                <strong class="error-msg">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr id="myhr" style="display: none">
                <div class="d-flex flex-column">
                    <div class="details-box flex-row align-items-center" id="new-publisher-form" style="display: none">
                        <h4>Book Publisher</h4>

                        {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                        <input type="text" name="new_publisher" id="">
                    </div>
                </div>

                <hr>
                <div class="d-flex flex-column">
                    <div class="details-box d-flex flex-row align-items-center" oninput="genreValidation()">
                        <h4>Book Genre</h4>
                        <select id="genre" name="genre">
                            @foreach ($genre as $g)
                                <option value={{ $g->genreName }}>{{ $g->genreName }}</option>
                            @endforeach
                            <option value="newgenre">Add New Genre</option>
                        </select>
                    </div>
                    <br>
                    <div class="error-msg">
                        @error('new_genre')
                            <strong class="error-msg">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <hr id="myhr1" style="display: none">
                <div class="details-box flex-row align-items-center" id="new-genre-form" style="display: none">
                    <h4>Book Genre</h4>
                    <input type="text" name="new_genre" id="">
                </div>

                <hr>
                <div class="d-flex flex-column">
                    <div class="details-box d-flex flex-row align-items-center">
                        <h4>Book Points</h4>
                        {{-- <h6>{{ $b->bookAuthor }}</h6> --}}
                        <input type="number" name="points" id="">
                    </div>
                    <br>
                    <div class="error-msg">
                        @error('points')
                            <strong class="error-msg">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <hr>
                <input type="submit">
        </div>
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
