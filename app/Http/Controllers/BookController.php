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
                $genre_id = Genre::where('genreName', $mostCommonGenre->genreName)->first();
                // $books = Book::where('genreID', $genre_id->id)->limit(4)->get();
            }
            else{
                // $books = Book::inRandomOrder()->limit(4)->get();
            }
        }
        else{
            $cartCount = 0;
        }
        $books = Book::inRandomOrder()->limit(4)->get();

        $session = app('session');
        $session->put('cartCounter', $cartCount);

        $bookPopular = Book::inRandomOrder()->limit(4)->get();
        $bestSeller = Book::inRandomOrder()->limit(4)->get();
        $bookSales = Book::where('isDiscount', 1)->limit(4)->get();



        return view('home', ['bookPopular' => $bookPopular, 'bestSeller' => $bestSeller, 'bookSales' => $bookSales, 'books' => $books, 'cartCount' => $cartCount]);
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
