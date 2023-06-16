<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function goToCartPage($id)
    {
        $cart = Cart::where('user_id', '=', "$id")->get();

        return view('cartpage', ['cart' => $cart]);
    }

    public function addToCart(Request $req, $id)
    {

        if (!Auth::check()) {
            return redirect('loginPage')->with('message', "Login to your account first!");
        } else {

            $book = Book::find($id);

            Cart::insert([
                'user_id' => Auth::user()->id,
                'book_id' => $book->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect('/')->with('message', 'Product added to cart succesfully!');
        }
    }

    public function deleteCart($id)
    {
        Cart::where('id', $id)->delete();

        return redirect('cartPage/' . Auth::user()->id)->with('message', 'Cart Deleted!');
    }

    public function checkOut($id)
    {
        $count = Cart::where('user_id', $id)->count();

        $books = Cart::where('user_id', $id)->get();

        $array = array();

        TransactionHeader::insert([
            'user_id' => Auth::user()->id,
            'tr_date' => Carbon::now(),
            'total_item' => $count,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        for ($i = 0; $i < $count; $i++) {
            $array[] = array(
                'book_id' => $books[$i]->book_id,
            );
        }

        $bookId = $books->first()->book_id;
        $bookPrice = Book::find($bookId)->bookPrice;

        $getLatestData = TransactionHeader::latest()->first();

        for ($i = 0; $i < $count; $i++) {
            TransactionDetail::insert([
                'transaction_header_id' => $getLatestData->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'book_id' => $books[$i]->book_id
            ]);
        }

        for ($i = 0; $i < $count; $i++) {
            $check = Inventory::where('book_id', $books[$i]->book_id)->exists();

            if ($check == NULL) {
                Inventory::insert([
                    'book_id' => $books[$i]->book_id,
                    'user_id' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            } else {
            }
        }
        $currentPoints = Auth::user()->points;

        $nowPoints = $currentPoints + ($bookPrice * 35 / 100);

        User::where('id', Auth::user()->id)->update([
            'points' => $nowPoints
        ]);

        Cart::where('user_id', $id)->truncate();
        session(['cartCounter' => 0]);
        return redirect('cartPage/' . Auth::user()->id)->with('message', 'Checkout success!');
    }
}
