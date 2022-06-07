<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function Manage()
    {
      $wallet= Wallet::all();
      return view('backend.pages.manage_wallet',compact('wallet'));
    }
    public function Store(Request $request)
    {
      $wallet= new Wallet();
      $wallet->name= $request->name;
      $wallet->wallet_id= $request->wallet_id;
      $wallet->status= $request->status;
      $wallet->save();
        return back()->with('wallet_added','Wallet Added Successfully');

    }
    public function Update(Request $request)
    {
      $wallet= Wallet::find($request->id);
      $wallet->name= $request->name;
      $wallet->wallet_id= $request->wallet_id;
      $wallet->status= $request->status;
      $wallet->save();
      return back()->with('wallet_updated','Wallet Updated Successfully');

    }
    public function Delete($id)
    {
      $wallet = Wallet::find($id);

      $wallet->delete();
      return back()->with('wallet_deleted','Wallet has been deleted successfully!');
    }
}
