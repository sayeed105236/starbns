<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPayment;
use Auth;

class UserPaymentController extends Controller
{
    public function index($id)
    {
      $payment=UserPayment::where('user_id',Auth::id())->first();
        return view('frontend.pages.user-payment',compact('payment'));
    }
    public function update(Request $request)
    {

      if ($request->id == null) {
        $payment= new UserPayment();
        $payment->user_id= $request->user_id;
        $payment->payment_method_id= $request->payment_method_id;
        $payment->acc_name= $request->acc_name;
        $payment->wallet_no= $request->wallet_no;
        $payment->save();
      }else {
        $payment= UserPayment::find($request->id);
        $payment->user_id= $request->user_id;
        $payment->payment_method_id= $request->payment_method_id;
        $payment->acc_name= $request->acc_name;
        $payment->wallet_no= $request->wallet_no;
        $payment->save();
      }

        return back()->with('payment_added','Payment Method has been Updated!!');
    }
}
