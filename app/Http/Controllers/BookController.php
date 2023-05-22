<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Genre;
use App\Models\Inventory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function index(){
        if (Auth::check()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
            $user = User::find(Auth::user()->id);

            if ($user) {
                $mostCommonGenre = Genre::withCount(['book' => function ($query) use ($user) {
                    $query->whereIn('id', $user->books->pluck('id'));
                }])
                ->orderBy('book_count', 'desc')
                ->first();
            }

            if ($mostCommonGenre){
                // dd($mostCommonGenre->genreName);
            }
        }
        else{
            $cartCount = 0;
        }


        $session = app('session');
        $session->put('cartCounter', $cartCount);
        $books = Book::limit(4)->get();
        $recBooks = Book::limit(3)->get();
        $discBooks = Book::where('isDiscount', '=', '1')->get();
        // dd($discBooks);
        return view('home', ['books' => $books, 'recBooks' => $recBooks, 'discBooks' => $discBooks, 'cartCount' => $cartCount]);
    }

    public function insert(Request $req){

    }

    public function readingPage($id){

        $book = Book::find($id);

        Inventory::where('user_id', Auth::user()->id)->where('book_id', $book->id)->update([
            'isBookOpen' => 1
        ]);

        $session = app('session');
        $session->put('startTime', Carbon::now());

        return view('readingbook', ['book' => $book]);
    }
}
