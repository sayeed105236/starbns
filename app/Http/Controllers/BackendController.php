<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;

class BackendController extends Controller
{
    public function UserList()
    {
      $users= User::all();
      return view('backend.pages.user_lists',compact('users'));
    }
    public function PackageList()
    {
      $users= User::all();
      return view('backend.pages.package_lists',compact('users'));
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
}
