<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function goToMyBooks(){
        $books = Book::all();
        $amountBooks = Book::get()->count();
        $randomBooksId = rand(1, $amountBooks);
        $randomBooks = Book::find($randomBooksId);
        return view('mybooks', ['randomBooks' => $randomBooks, 'books' => $books]);
    }
}
