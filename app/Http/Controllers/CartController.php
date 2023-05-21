<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function goToCartPage($id){
        $cart = Cart::where('user_id', '=', "$id")->get();

        return view ('cartpage', ['cart' => $cart]);
    }

    public function addToCart(Request $req, $id){
        $book = Book::find($id);

        $qty = $req->qty;

        $check = Cart::where('book_id', '=', "$req->id")->where('user_id', '=', Auth::user()->id)->first();

        if ($check == NULL){
            Cart::insert([
                'user_id' => Auth::user()->id,
                'book_id' => $book->id,
                'qty' => $qty,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        else{
            $incrementQty = $check->qty + $qty;
            Cart::where('book_id', $req->id)->update([
                'qty' => $incrementQty
            ]);
        }

        return redirect('/')->with('message', 'Product added to cart succesfully!');
    }

    public function updateQty(Request $req, $id){

        Cart::where('id', $id)->update([
            'qty' => $req->qty
        ]);


        return redirect('cartPage/'.Auth::user()->id)->with('message', 'Game Quantity Updated!');
    }

    public function deleteCart($id){
        Cart::where('id', $id)->delete();

        return redirect('cartPage/'.Auth::user()->id)->with('message', 'Cart Deleted!');
    }
}
