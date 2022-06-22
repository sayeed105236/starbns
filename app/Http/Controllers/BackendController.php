<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use App\Models\Roi;
use App\Models\Purchase;
use App\Models\IncomeWallet;
use App\Models\Package;
use Carbon\Carbon;
use DateTime;

class BackendController extends Controller
{
    public function UserList()
    {
      $users= User::all();
      return view('backend.pages.user_lists',compact('users'));
    }

    public function ManageDeposit()
    {
      $deposit= AddMoney::where('method','Deposit')->get();
      return view('backend.pages.deposit_request',compact('deposit'));
    }
    public function approve($id)
    {

        AddMoney::findOrFail($id)->update([
            'status'=>'approve'
        ]);
        return back()->with('money_added', 'Fund has been deposited to User Account!!');
    }
    public function rejected($id)
    {

        AddMoney::findOrFail($id)->update([
            'status'=>'rejected'
        ]);
        return back()->with('money_rejected', 'Deposit Request has been Rejected!!');
    }
    public function DailyRoi()
    {
      $daily_bonus= IncomeWallet::where('method','Daily Bonus')->where('status','approve')->get();
      return view('backend.pages.daily_roi',compact('daily_bonus'));
    }
    public function StoreRoi(Request $request)
    {
      $roi= new Roi();
      $roi->user_id= $request->user_id;
      $roi->percentage= ($request->percentage)/100;
      $roi->date= Carbon::now();
      $roi->save();
      $purchases= Purchase::all();
      foreach ($purchases as $row) {

              $date1 = new DateTime($row['created_at']);
              $date2 = new DateTime(Carbon::now()->addDay(1));
              $days  = $date2->diff($date1)->format('%a');
              $package= Package::first();


              if ($days <= 365){

                  $bonus= new IncomeWallet();
                  $bonus->user_id= $row->user_id;

                  $bonus->amount= ($package->package_price)*($roi->percentage);
                  $bonus->method= 'Daily Bonus';
                  $bonus->type= 'Credit';
                  $bonus->status= 'approve';
                  $bonus->description=($package->package_price)*($roi->percentage). '$ ' . 'Daily Bonus for purchasing Package';
                  $bonus->save();


                    }

  }
    return back()->with('money_added', 'Daily ROI Successfully Added!!');
}

}
