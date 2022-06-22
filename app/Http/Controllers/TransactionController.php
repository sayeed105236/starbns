<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use Auth;
use App\Models\IncomeWallet;
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
    public function Activation($id)
    {
      $activation=AddMoney::where('user_id',Auth::id())->where('method','Activation Charge')->get();
      return view('frontend.pages.activation_history',compact('activation'));
    }
    public function SponsorBonus($id)
    {
      $sponsor_bonus=IncomeWallet::where('user_id',Auth::id())->where('method','Sponsor Bonus')->get();
      return view('frontend.pages.sponsorbonus_history',compact('sponsor_bonus'));
    }
    public function LevelBonus($id)
    {
      $level_bonus=IncomeWallet::where('user_id',Auth::id())->where('method','Level Bonus')->get();
      return view('frontend.pages.levelbonus_history',compact('level_bonus'));
    }
    public function DailyBonus($id)
    {
      $daily_bonus=IncomeWallet::where('user_id',Auth::id())->where('method','Level Bonus')->get();
      return view('frontend.pages.dailybonus_history',compact('daily_bonus'));
    }
}
