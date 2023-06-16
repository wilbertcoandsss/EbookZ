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

    public function goToConfSubPage($id)
    {
        return view('confirmsubscribe', ['sid' => $id]);
    }

    public function goToLibrary()
    {
        $books = Book::all();
        $genre = Genre::all();
        $bestSeller = Book::inRandomOrder()->limit(4)->get();
        $bookSales = Book::where('isDiscount', 1)->limit(4)->get();
        return view('library', ['books' => $books, 'genre' => $genre, 'bestseller' => $bestSeller, 'bookSales' => $bookSales]);
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

    public function goToPublisherPage()
    {
        return view('publisherpage');
    }

    public function goToRegisterPage()
    {
        return view('register');
    }

    public function goToManageBookPage()
    {
        $publisherId = Publisher::where('publisherName', Auth::user()->name)->first();
        $book = Book::where('publisherID', $publisherId->id)->get();
        return view('managebook', ['books' => $book]);
    }

    public function goToEditBookPage()
    {
        $publisherId = Publisher::where('publisherName', Auth::user()->name)->first();
        $book = Book::where('publisherID', $publisherId->id)->get();
        return view('editbook', ['books' => $book]);
    }

    public function goToAddBookPage()
    {
        // $book = Book::all();
        $publisher = Publisher::all();
        $genre = Genre::all();
        return view('addbook', ['publisher' => $publisher, 'genre' => $genre]);
    }

    public function goToUpdateBookDetailPage($id)
    {
        $books = Book::find($id);
        $publisher = Publisher::all();
        $genre = Genre::all();
        return view('updatebookdetail', ['books' => $books, 'publisher' => $publisher, 'genre' => $genre]);
    }

    public function goToDashboardPage()
    {
        $transaction = TransactionHeader::all();
        $result = DB::table('transaction_details as td')
            ->join('books as b', 'td.book_id', '=', 'b.id')
            ->select(DB::raw('SUM(1 * b.bookPrice) as total'))
            ->first();

        $total = $result->total;

        return view('dashboard', ['transaction' => $transaction, 'total' => $total]);
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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect('/myMission')->with('message', 'Redeem success!');
    }

    public function beforeReadPage($id)
    {
        $book = Book::find($id);
        return view('beforeread', ['book' => $book]);
    }

    public function verifyPw(Request $req, $bid)
    {
        $pw = $req->password;
        $book = Book::find($bid);
        $user = User::find(Auth::user()->id);

        if (Hash::check($pw, $user->password)) {
            return redirect()->route('readingBookPage', ['id' => $book->id]);
        } else {
            return redirect()->back()->with('message', 'Password didnt match!');
        }
    }

    public function goToProfilePublisherPage()
    {
        return view('profilepublisher');
    }

    public function goToProfileCustomerPage()
    {
        if (Auth::user()->recentOpenedBook == null) {
            return view('profileuser');
        } else {
            $book = Book::find(Auth::user()->recentOpenedBook);
            return view('profileuser', ['book' => $book]);
        }
    }

    public function verifySubs($sid)
    {
        $subscribeStart = Carbon::now();
        $subsPrice = 0;
        $subsName = null;

        if (Auth::user()->isSubscribe) {
            $subscribeStart = Auth::user()->subscribeStart;
            if ($sid == 1) {
                $subscribeEnd = Carbon::parse(Auth::user()->subscribeEnd)->addMonth(3);
                $subsPrice = 150000;
                $subsName = "Subscription Package (3 Months)";
            } else if ($sid == 2) {
                $subscribeEnd = Carbon::parse(Auth::user()->subscribeEnd)->addMonth(6);
                $subsPrice = 250000;
                $subsName = "Subscription Package (6 Months)";
            } else if ($sid == 3) {
                $subscribeEnd = Carbon::parse(Auth::user()->subscribeEnd)->addMonth(9);
                $subsPrice = 400000;
                $subsName = "Subscription Package (9 Months)";
            } else if ($sid == 4) {
                $subscribeEnd = Carbon::parse(Auth::user()->subscribeEnd)->addMonth(12);
                $subsPrice = 550000;
                $subsName = "Subscription Package (12 Months)";
            }
        } else {
            if ($sid == 1) {
                $subscribeEnd = Carbon::now()->addMonth(3);
                $subsPrice = 150000;
                $subsName = "Subscription Package (3 Months)";
            } else if ($sid == 2) {
                $subscribeEnd = Carbon::now()->addMonth(6);
                $subsPrice = 250000;
                $subsName = "Subscription Package (6 Months)";
            } else if ($sid == 3) {
                $subscribeEnd = Carbon::now()->addMonth(9);
                $subsPrice = 40000;
                $subsName = "Subscription Package (9 Months)";
            } else if ($sid == 4) {
                $subscribeEnd = Carbon::now()->addMonth(12);
                $subsPrice = 550000;
                $subsName = "Subscription Package (12 Months)";
            }
        }

        User::where('id', Auth::user()->id)->update([
            'isSubscribe' => true,
            'subscribeStart' => $subscribeStart,
            'subscribeEnd' => $subscribeEnd
        ]);

        TransactionHeader::insert([
            'user_id' => Auth::user()->id,
            'tr_date' => Carbon::now(),
            'total_item' => 1,
            'subsPayment' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        $getLatestData = TransactionHeader::latest()->first();

        TransactionDetail::insert([
            'transaction_header_id' => $getLatestData->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'subsPrice' => $subsPrice,
            'subsName' => $subsName,
            'book_id' => 1
        ]);

        return redirect('subscriptionPage')->with('message', 'Subscription added succesfully!');
    }

    public function goToSubPage()
    {
        return view('subscription');
    }
}
