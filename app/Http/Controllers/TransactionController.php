<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function transactionHistoryPage($id)
    {
        $trHistory = TransactionHeader::where('user_id', $id)->get();
        return view('transactionhistory', ['trhistory' => $trHistory]);
    }

    public function transactionDetailPage($id)
    {
        $trDetail = TransactionDetail::where('transaction_header_id', $id)->get();
        $count = TransactionDetail::where('transaction_header_id', $id)->count();
        $thDetail = TransactionHeader::find($id);

        $subTotal[] = 0;
        $totalPrice = 0;

        $myCartItem = TransactionHeader::find($id);

        $Price = [];

        return view('transactiondetail', ['trdetail' => $trDetail, 'thdetail' => $thDetail]);
    }
}
