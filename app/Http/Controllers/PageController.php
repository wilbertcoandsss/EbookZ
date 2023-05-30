<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Inventory;
use App\Models\Mission;
use App\Models\MissionUser;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function goToMyBooks()
    {

        // session()->forget('startTime');
        if (Auth::check()) {
            if (session()->has('startTime') != null) {
                $currentTime = Carbon::now();
                $anotherTime = session()->get('startTime');
                $minutesDifference = ceil($currentTime->diffInMinutes($anotherTime));

                if (Auth::user()->readTime == null) {
                    // dd(Auth::user()->readTime);
                    User::where('id', Auth::user()->id)->update([
                        'readTime' => $minutesDifference
                    ]);
                } else {
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
            $currentUserId = Auth::user()->id;
            $randomBooks = Book::whereDoesntHave('inventory', function ($query) use ($currentUserId) {
                $query->where('user_id', $currentUserId);
            })->get();

            $randomBooks = $randomBooks->pluck('id')->toArray();
            $randomBookId = $randomBooks[array_rand($randomBooks)];

            $randomBooksId = Book::find($randomBookId);

            $readBooks = Inventory::where('user_id', Auth::user()->id)->where('isBookOpen', 1)->get();

            $userBooks = Inventory::where('user_id', Auth::user()->id)->get();


            $bookUserCount = Inventory::where('user_id', Auth::user()->id)->count();

            return view('mybooks', ['randomBooks' => $randomBooksId, 'books' => $books, 'userBooks' => $userBooks, 'readBooks' => $readBooks, 'bookUserCount' => $bookUserCount]);
        }
    }

    public function goToBooksDetail($id)
    {
        $bookDetail = Book::where('id', $id)->get();
        return view('bookdetail', ['bookDetail' => $bookDetail]);
    }

    public function goToLoginPage()
    {
        return view('login');
    }

    public function goToRegisterPage()
    {
        return view('register');
    }

    public function goToMissionPage()
    {

        $missions = Mission::all();
        $currentUserId = Auth::user()->id;
        $books = Book::whereDoesntHave('inventory', function ($query) use ($currentUserId) {
            $query->where('user_id', $currentUserId);
        })->get();

        $bookUserCount = Inventory::where('user_id', Auth::user()->id)->count();

        $missionUser = MissionUser::where('user_id', Auth::user()->id)->get();

        return view('mission', ['missions' => $missions, 'books' => $books, 'bookUserCount' => $bookUserCount, 'missionDone' => $missionUser]);
    }

    public function claimRewards($id, $bid)
    {
        $mission = Mission::find($id);
        $book = Book::find($bid);

        Inventory::insert([
            'book_id' => $book->id,
            'user_id' => Auth::user()->id,
            'qty' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        MissionUser::insert([
            'user_id' => Auth::user()->id,
            'mission_id' => $mission->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('myMission')->with('message', 'Missions claimed succesfully');
    }

    public function claimPoints($id)
    {
        $mission = Mission::find($id);

        $currentPoints = Auth::user()->points;
        $currentPoints = $currentPoints + 50000;

        User::where('id', Auth::user()->id)->update([
            'points' => $currentPoints
        ]);

        MissionUser::insert([
            'user_id' => Auth::user()->id,
            'mission_id' => $mission->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('myMission')->with('message', 'Missions claimed succesfully');
    }

    public function redeemPoints($id)
    {
        $book = Book::find($id);


        if (Auth::user()->points < $book->bookPoints) {
            return redirect('/myMission')->with('err', 'Your points are not enough');
        } else {

            $currentPoints = Auth::user()->points;
            $deductedPoints = $currentPoints - $book->bookPoints;

            User::where('id', Auth::user()->id)->update([
                'points' => $deductedPoints
            ]);

            Inventory::insert([
                'book_id' => $book->id,
                'user_id' => Auth::user()->id,
                'qty' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect('/myMission')->with('message', 'Redeem success!');
    }
}
