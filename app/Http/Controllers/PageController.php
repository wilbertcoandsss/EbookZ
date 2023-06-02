<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Inventory;
use App\Models\Mission;
use App\Models\MissionUser;
use App\Models\Publisher;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function goToAdminPage()
    {
        return view('adminpage');
    }

    public function goToRegisterPage()
    {
        return view('register');
    }

    public function goToManageBookPage(){
        $book = Book::all();
        return view('managebook', ['books' => $book]);
    }

    public function goToEditBookPage(){
        $book = Book::all();
        return view('editbook', ['books' => $book]);
    }

    public function goToAddBookPage(){
        // $book = Book::all();
        $publisher = Publisher::all();
        $genre = Genre::all();
        return view('addbook', ['publisher' => $publisher, 'genre' => $genre]);
    }

    public function goToUpdateBookDetailPage($id){
        $books = Book::find($id);
        $publisher = Publisher::all();
        $genre = Genre::all();
        return view ('updatebookdetail', ['books' => $books, 'publisher' => $publisher, 'genre' => $genre]);
    }

    public function goToDashboardPage(){
        $transaction = TransactionHeader::all();
        $result = DB::table('transaction_details as td')
        ->join('books as b', 'td.book_id', '=', 'b.id')
        ->select(DB::raw('SUM(td.qty * b.bookPrice) as total'))
        ->first();

        $total = $result->total;

        return view ('dashboard', ['transaction' => $transaction, 'total' => $total]);
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

    public function beforeReadPage($id){
        $book = Book::find($id);
        return view('beforeread', ['book' => $book]);
    }

    public function verifyPw(Request $req, $bid){
        $pw = $req->password;
        $book = Book::find($bid);
        $user = User::find(Auth::user()->id);

        if(Hash::check($pw, $user->password)){
            return redirect()->route('readingBookPage', ['id' => $book->id]);
        }

        else{
            return redirect()->back()->with('message', 'Password didnt match!');
        }
    }

    public function goToProfileAdminPage(){
        return view('profileadmin');
    }

    public function goToProfileCustomerPage(){
        if (Auth::user()->recentOpenedBook == null){
            return view('profileuser');
        }
        else{
            $book = Book::find(Auth::user()->recentOpenedBook);
            return view('profileuser', ['book' => $book]);
        }
    }
}
