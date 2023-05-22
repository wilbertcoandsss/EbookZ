<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function index(){
        if (Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }
        else{
            $cartCount = 0;
        }
        $session = app('session');
        $session->put('cartCounter', $cartCount);
        $books = Book::all();
        $recBooks = Book::limit(3)->get();
        $discBooks = Book::where('isDiscount', '=', '1')->get();
        // dd($discBooks);
        return view('home', ['books' => $books, 'recBooks' => $recBooks, 'discBooks' => $discBooks, 'cartCount' => $cartCount]);
    }

    public function insert(Request $req){

    }
}
