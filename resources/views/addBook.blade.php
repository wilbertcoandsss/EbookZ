@extends('layout.adminHeader')

@section('title', 'Add Book')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/addBook.css') }}">
    <div class="content">
        <div class="searchProfile">
            <div class="searchBar">
                <div class="searchLogo">
                    <img src="fotomanagemybook/search-logo.png"/>
                </div>
                <input type="text"/>
            </div>
            <div class="profile">
                <img src="fotomanagemybook/profile-icon.png"/>
            </div>
        </div>
        <div class="menu">
            <li class="mb"><a href="manageMyBook.html">My Book</a></li>
            <li class="ab"><a href="addBook.html">Add Book</a></li>
            <li class="eb"><a href="editBook.html">Edit Book</a></li>
        </div>
        <div class="mbar">
            <div class="mainbar">
                <div class="Header">Book Detail</div>

                <li class="bcov">Book Cover</li>
                <t class="detail">Please insert your book cover with maximum size of 2MB</t>

                <div class="container">
                    <div class="img-area" data-img="">
                        <button class="selim">
                            <img src="fotomanagemybook/insert.png"><input class="jajan" type="file" id="file" accept="image/*"></button>

                    </div>
                </div>
                <div class="wrapper">
                    <div class="inputf">
                        <label>Book Name</label>
                        <t class="details">Please insert your book cover with maximum size of 2MB</t>
                        <input type="text" class="input">
                    </div>
                    <div class="inputf">
                        <label>Category</label>
                        <t class="details1">Please insert your book cover with maximum size of 2MB</t>
                        <div class="custom_select">
                            <select>
                            <option value=""></option>
                            <option value="horror">Horror</option>
                            <option value="fantasy">Fantasy</option>
                            <option value="action">Action</option>
                            <option value="mistery">Mistery</option>
                            <option value="mantap">Mantap</option>
                        </select>
                        </div>
                    </div>
                    <div class="inputf">
                        <label>Book Synopsis</label>
                        <t class="details2">Please insert your book cover with maximum size of 2MB</t>
                        <input type="text" class="inputs">
                    </div>


                    <div class="inp">
                        <label>Book Price</label>
                        <t class="details3">Please insert your book cover with maximum size of 2MB</t>
                        <input type="text" class="input2">
                    </div>
                    <div class="inp1">
                        <label>Promo</label>
                        <t class="details4">Please insert your book cover with maximum size of 2MB</t>
                        <input type="text" class="input2">
                    </div>

                    <button onclick="location.href='managemybook.html'" class="submit"><span class="spn">Publish</span></button>

                </div>
            </div>
        </div>

@endsection
