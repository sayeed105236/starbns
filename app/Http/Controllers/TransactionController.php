<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use Auth;
class TransactionController extends Controller
{
    public function Deposit($id)
    {
      $deposit=AddMoney::where('user_id',Auth::id())->where('method','Deposit')->get();
      return view('frontend.pages.deposit_history',compact('deposit'));
    }
    public function Transfer($id)
    {
      $transfer=AddMoney::where('user_id',Auth::id())->where('method','Transfer Money')->get();
      return view('frontend.pages.transfer_history',compact('transfer'));
    }
}
