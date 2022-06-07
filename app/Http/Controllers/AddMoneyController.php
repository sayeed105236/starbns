<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use Auth;
use App\Models\User;

class AddMoneyController extends Controller
{
    public function store(Request $request)
    {

      $deposit = new AddMoney();

      $deposit->user_id = Auth::id();
      $deposit->amount = $request->amount;
      //$deposit->method=$method;
      $deposit->payment_method_id= $request->payment_method_id;

      $deposit->method = 'Deposit';
      $deposit->type = 'Credit';
      $deposit->status = 'pending';
      $deposit->description= 'Deposit Manually';
      $deposit->txn_id = $request->txn_id;
      $deposit->save();

        return back()->with('money_added', 'Successfully Added Funds. Waiting for the Confirmation!!');
    }
    public function transfer(Request $request)
    {
      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      //dd($data['sum_deposit']);
      if($data['sum_deposit'] < $request->amount)
      {
          return back()->with('transfer_error', 'Insufficent Balance');
      }else{

              $receiver_id= User::where('user_name',$request->receiver_id)->pluck('id')->first();
              $receiver_name= User::where('id',$receiver_id)->first();


              $transfer_deduct= new AddMoney();
              $transfer_deduct->user_id= $request->user_id;
              $transfer_deduct->receiver_id= $receiver_id;
              $transfer_deduct->amount= -($request->amount);
              $transfer_deduct->method= 'Transfer Money';
              $transfer_deduct->type= 'Debit';
              $transfer_deduct->description= '$'.$request->amount .' Transfer to '. $receiver_name->user_name;
              $transfer_deduct->status= 'approve';
              $transfer_deduct->save();

              $sender_name= User::where('id',$request->user_id)->first();
              $transfer= new AddMoney();
              $transfer->user_id= $receiver_id;
              $transfer->received_from= $request->user_id;
              $transfer->amount= $request->amount;
              $transfer->method= 'Transfer Money';
              $transfer->type= 'Credit';
              $transfer->description= $request->amount .' Transfer amount from '. $sender_name->user_name;
              $transfer->status= 'approve';
              $transfer->save();

              return back()->with('transfer_fund', 'Fund Transfer Successfully');
            }
      }
}
