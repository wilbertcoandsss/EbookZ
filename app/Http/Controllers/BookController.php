<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Genre;
use App\Models\Inventory;
use App\Models\Publisher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\map;

class BookController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
            $user = User::find(Auth::user()->id);

            if ($user) {
                $mostCommonGenre = Genre::withCount(['book' => function ($query) use ($user) {
                    $query->whereIn('id', $user->books->pluck('id'));
                }])
                    ->orderBy('book_count', 'desc')
                    ->first();
            }

            if ($mostCommonGenre) {
                $genre_id = Genre::where('genreName', $mostCommonGenre->genreName)->first();
                // $books = Book::where('genreID', $genre_id->id)->limit(4)->get();
            } else {
                // $books = Book::inRandomOrder()->limit(4)->get();
            }
        } else {
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

    public function addBook(Request $req)
    {
        $rules = [
            'name' => 'required',
            'cover' => 'required|mimes:jpg,jpeg,png',
            'author' => 'required',
            'price' => 'required|numeric|gte:0',
            'description' => 'required',
            'date' => 'required',
            'page' => 'required|numeric|gte:0',
            'isbn' => 'required|numeric|gte:0',
            'pdf' => 'required',
            'publisher' => 'required',
            'genre' =>  'required',
            'new_publisher' => 'unique:publishers,publisherName',
            'new_genre' => 'unique:genres,genreName',
            'points' => 'required|numeric|gte:5000'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $new_genre = $req->genre;
        $new_publisher = $req->publisher;
        // dd($new_genre, $new_publisher);

        if ($req->new_genre != null) {
            Genre::insert([
                'genreName' => $req->new_genre,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $new_genre = $req->new_genre;
        }


        if ($req->new_publisher != null) {
            // dd("MASUK", $req->new_publisher);
            Publisher::insert([
                'publisherName' => $req->new_publisher,
                'publisherEmail' => "@gmail.combang",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $new_publisher = $req->new_publisher;
        }

        $cover = $req->file('cover');

        $res = Genre::where('genreName', 'LIKE', '%' . "$new_genre" . '%')->first();
        // $res1 = Publisher::where('publisherName', 'LIKE', '%"$new_publisher"%')->first();
        $res1 = Publisher::where('publisherName', 'LIKE', '%' . $new_publisher . '%')->first();

        $coverExtension = $cover->getClientOriginalExtension();
        $fileNameCover = $req->name . '.' . $coverExtension;

        $pdf = $req->file('pdf');

        $pdfBooks = $pdf->getClientOriginalExtension();
        $pdfName = $req->name . '.' . $pdfBooks;

        Storage::putFileAs('public/books/', $cover, $fileNameCover);
        Storage::putFileAs('public/pdf/', $pdf, $pdfName);

        Book::insert([
            'bookName' => $req->name,
            'bookAuthor' => $req->author,
            'bookPrice' => $req->price,
            'bookStock' => 0,
            'ISBN' => $req->isbn,
            'bookDescription' => $req->description,
            'bookPublishDate' => $req->date,
            'bookPage' => $req->page,
            'bookCover' => $fileNameCover,
            'bookPdf' => $pdfName,
            'publisherID' => $res1->id,
            'bookPoints' => $req->points,
            'genreID' => $res->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/addBookPage')->with('message', 'Book Succsefully Inserted!');
    }

    public function readingPage($id)
    {

        $book = Book::find($id);

        Inventory::where('user_id', Auth::user()->id)->where('book_id', $book->id)->update([
            'isBookOpen' => 1
        ]);

        $session = app('session');
        $session->put('startTime', Carbon::now());

        return view('readingbook', ['book' => $book]);
    }

    public function deleteBook($id)
    {
        $b = Book::find($id);

        Storage::delete('public/books/' . $b->bookCover);
        Storage::delete('public/pdf/' . $b->bookPdf);

        Book::where('id', $id)->delete();

        return redirect('/editBookPage')->with('message', 'Book deleted succesfully!');
    }

    public function updateBook(Request $req, $id){
        $rules = [
            'name' => 'required',
            'cover' => 'required|mimes:jpg,jpeg,png',
            'author' => 'required',
            'price' => 'required|numeric|gte:0',
            'description' => 'required',
            'date' => 'required',
            'page' => 'required|numeric|gte:0',
            'isbn' => 'required|numeric|gte:0',
            'pdf' => 'required',
            'publisher' => 'required',
            'genre' =>  'required',
            'new_publisher' => 'unique:publishers,publisherName',
            'new_genre' => 'unique:genres,genreName',
            'points' => 'required|numeric|gte:5000'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $new_genre = $req->genre;
        $new_publisher = $req->publisher;
        // dd($new_genre, $new_publisher);

        if ($req->new_genre != null) {
            Genre::insert([
                'genreName' => $req->new_genre,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $new_genre = $req->new_genre;
        }


        if ($req->new_publisher != null) {
            // dd("MASUK", $req->new_publisher);
            Publisher::insert([
                'publisherName' => $req->new_publisher,
                'publisherEmail' => "@gmail.combang",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $new_publisher = $req->new_publisher;
        }

        $cover = $req->file('cover');

        $res = Genre::where('genreName', 'LIKE', '%' . "$new_genre" . '%')->first();
        // $res1 = Publisher::where('publisherName', 'LIKE', '%"$new_publisher"%')->first();
        $res1 = Publisher::where('publisherName', 'LIKE', '%' . $new_publisher . '%')->first();

        $book = Book::find($id);

        if ($book->bookCover != null){
            Storage::delete('public/books/'.$book->bookCover);

            $cover = $req->file('cover');

            $coverExtension = $cover->getClientOriginalExtension();
            $fileNameCover = $req->name . '.' . $coverExtension;

            Storage::putFileAs('public/books/', $cover, $fileNameCover);

            Book::where('id', $req->id)->update([
                'bookCover' => $fileNameCover
            ]);
        }

        if ($book->bookPdf != null){
            Storage::delete('public/pdf/'.$book->bookPdf);

            $pdf = $req->file('pdf');

            $pdfBooks = $pdf->getClientOriginalExtension();
            $pdfName = $req->name . '.' . $pdfBooks;

            Storage::putFileAs('public/pdf/', $pdf, $pdfName);

            Book::where('id', $req->id)->update([
                'bookPdf' => $pdfName
            ]);
        }

        Book::where('id', $req->id)->update([
            'bookName' => $req->name,
            'bookAuthor' => $req->author,
            'bookPrice' => $req->price,
            'bookStock' => 0,
            'ISBN' => $req->isbn,
            'bookDescription' => $req->description,
            'bookPublishDate' => $req->date,
            'bookPage' => $req->page,
            'bookCover' => $fileNameCover,
            'bookPdf' => $pdfName,
            'publisherID' => $res1->id,
            'bookPoints' => $req->points,
            'genreID' => $res->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/editBookPage')->with('message', 'Book Succsefully Updated!');
    }

    public function searchBook(Request $req){
        $search = $req->search;
        $books = Book::where('bookName', 'LIKE', "%$search%")->get();

        return view ('managebook', ['books' => $books]);
    }
}
