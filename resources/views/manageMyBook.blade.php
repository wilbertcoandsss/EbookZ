@extends('layout.adminHeader')

@section('title', 'Manage My Book')

@section('content')
<link rel="stylesheet" href="{{ asset('css/manageMyBook.css') }}">
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
            <div class="header">My Book</div>
            <div class="title">
                <div class="bookInfo">Book Info</div>
                <div class="price">Price</div>
            </div>
            <div class="bookList">
                <div class="infoSection">
                    <img src="fotomanagemybook/Hidden.png">
                    <div class="text">
                        <h2 class="judul">The Hidden: A Novel</h2>
                        <div class="author">
                            <p class="by">By</span>
                            <p class="name">Melanie Golding</p>
                        </div>
                        <p class="desc">One dark December night, in a small seaside town, a little girl is found abandoned. When her mother finally arrives, authorities release the pair, believing it...</p>
                        <div class="readMore">
                            <img class="icon" src="fotomanagemybook/more.png">
                            <button class="btn">read more</button>
                        </div>
                    </div>
                </div>
                <div class="priceSection">
                    <div class="currency">Rp</div>
                    <div class="ammount">64.000</div>
                </div>
                <div class="actionSection">
                    <div class="tbox">
                        <input type="checkbox">
                        <label for="" class="onbtn"></label>
                        <label for="" class="ofbtn"></label>
                    </div>
                </div>
            </div>
            <div class="bookList">
                <div class="infoSection">
                    <img src="fotomanagemybook/Hidden.png">
                    <div class="text">
                        <h2 class="judul">The Hidden: A Novel</h2>
                        <div class="author">
                            <p class="by">By</span>
                            <p class="name">Melanie Golding</p>
                        </div>
                        <p class="desc">One dark December night, in a small seaside town, a little girl is found abandoned. When her mother finally arrives, authorities release the pair, believing it...</p>
                        <div class="readMore">
                            <img class="icon" src="fotomanagemybook/more.png">
                            <button class="btn">read more</button>
                        </div>
                    </div>
                </div>
                <div class="priceSection">
                    <div class="currency">Rp</div>
                    <div class="ammount">64.000</div>
                </div>
                <div class="actionSection">
                    <div class="tbox">
                        <input type="checkbox">
                        <label for="" class="onbtn"></label>
                        <label for="" class="ofbtn"></label>
                    </div>
                </div>
            </div>
            <div class="bookList">
                <div class="infoSection">
                    <img src="fotomanagemybook/Hidden.png">
                    <div class="text">
                        <h2 class="judul">The Hidden: A Novel</h2>
                        <div class="author">
                            <p class="by">By</span>
                            <p class="name">Melanie Golding</p>
                        </div>
                        <p class="desc">One dark December night, in a small seaside town, a little girl is found abandoned. When her mother finally arrives, authorities release the pair, believing it...</p>
                        <div class="readMore">
                            <img class="icon" src="fotomanagemybook/more.png">
                            <button class="btn">read more</button>
                        </div>
                    </div>
                </div>
                <div class="priceSection">
                    <div class="currency">Rp</div>
                    <div class="ammount">64.000</div>
                </div>
                <div class="actionSection">
                    <div class="tbox">
                        <input type="checkbox">
                        <label for="" class="onbtn"></label>
                        <label for="" class="ofbtn"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection