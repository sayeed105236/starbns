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
use App\Models\Generation;

class BackendController extends Controller
{
    public function UserList()
    {
      $users= User::all();

      return view('backend.pages.user_lists',compact('users'));
    }
    public function GlobalList()
    {
      $users= User::where('global_member','1')->get();

      return view('backend.pages.global_lists',compact('users'));
    }
    public function StoreMembershipBonus(Request $request)
    {
      $bonus = $request->amount;
      $users=User::where('global_member','1')->where('status','1')->get();
      $user_count=User::where('global_member','1')->count();
      $bonus_amount=($request->amount)/$user_count;
      //$method=$request->method;
      //$txn_id=$request->txn_id;
      foreach ($users as $key => $user) {
        $membership_bonus = new IncomeWallet();

        $membership_bonus-> user_id = $user->id;
        $membership_bonus-> amount =$bonus_amount;
        $membership_bonus-> type ='Credit';
        //$membership_bonus-> amount =$amount;
        //$membership_bonus->method=$method;
        $membership_bonus->method='Global Membership Bonus';
        $membership_bonus->status ='approve';
        $membership_bonus->description = $bonus_amount . '$'.  ' Global Memebership Bonus amount is credited for Premium Membership ';
        //$membership_bonus->txn_id=$txn_id;
        $membership_bonus->save();
      }

      return back()->with('bonus_added','Global Membership Bonus Has been successfully credited among the Users!!');
    
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
    public function IncomeGeneration()
    {
      $i_generation= Generation::first();
      return view('backend.pages.income_generation',compact('i_generation'));
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
                  $activation_status= User::where('id',$row->user_id)->first();
                //  dd($activation_status);
                  if ($activation_status->status== 1) {
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

  }
    return back()->with('money_added', 'Daily ROI Successfully Added!!');
}
    public function UpdateIncomeGeneration(Request $request)
    {
      $i_generation= Generation::find($request->id);
      $i_generation->lvl_1=$request->lvl_1;
      $i_generation->lvl_2=$request->lvl_2;
      $i_generation->lvl_3=$request->lvl_3;
      $i_generation->lvl_4=$request->lvl_4;
      $i_generation->lvl_5=$request->lvl_5;
      $i_generation->save();
      return back()->with('gen_updated', 'Settings Successfully Updated!!');
    }

}
