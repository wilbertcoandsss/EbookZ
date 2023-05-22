<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Inventory;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function goToMyBooks(){

        // session()->forget('startTime');
        if (session()->has('startTime') != null){
            $currentTime = Carbon::now();
            $anotherTime = session()->get('startTime');
            $minutesDifference = $currentTime->diffInMinutes($anotherTime);

            // dd($minutesDifference);
            if (Auth::user()->readTime == null){
                // dd(Auth::user()->readTime);
                User::where('id', Auth::user()->id)->update([
                    'readTime' => $minutesDifference
                ]);
            }
            else{
                $oldMin = Auth::user()->readTime;
                $updateMin = $oldMin + $minutesDifference;
                User::where('id', Auth::user()->id)->update([
                    'readTime' => $updateMin
                ]);
            }

            session()->forget('startTime');
        }

        $books = Book::all();
        $amountBooks = Book::get()->count();
        $randomBooksId = rand(1, $amountBooks);
        $randomBooks = Book::find($randomBooksId);

        $readBooks = Inventory::where('user_id', Auth::user()->id)->where('isBookOpen', 1)->get();

        $userBooks = Inventory::where('user_id', Auth::user()->id)->get();

        return view('mybooks', ['randomBooks' => $randomBooks, 'books' => $books, 'userBooks' => $userBooks, 'readBooks' => $readBooks]);
    }

    public function goToBooksDetail($id){
        $bookDetail = Book::where('id', $id)->get();
        return view ('bookdetail', ['bookDetail' => $bookDetail]);
    }

    public function goToLoginPage(){
        return view ('login');
    }

    public function goToRegisterPage(){
        return view ('register');
    }

}
