<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        $recBooks = Book::limit(3)->get();
        $discBooks = Book::where('isDiscount', '=', '1')->get();
        // dd($discBooks);
        return view('home', ['books' => $books, 'recBooks' => $recBooks, 'discBooks' => $discBooks]);
    }

    public function insert(Request $req){

    }
}
