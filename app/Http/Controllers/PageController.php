<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Inventory;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function goToMyBooks(){
        $books = Book::all();
        $amountBooks = Book::get()->count();
        $randomBooksId = rand(1, $amountBooks);
        $randomBooks = Book::find($randomBooksId);

        $userBooks = Inventory::where('user_id', Auth::user()->id)->get();

        return view('mybooks', ['randomBooks' => $randomBooks, 'books' => $books, 'userBooks' => $userBooks]);
    }

    public function goToBooksDetail($id){
        $bookDetail = Book::where('id', $id)->get();
        return view ('bookdetail', ['bookDetail' => $bookDetail]);
    }

    public function goToLoginPage(){
        return view ('login');
    }

}
