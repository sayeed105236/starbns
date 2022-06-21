<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FrontendController extends Controller
{
    public function index($id)
    {
      $users= User::where('sponsor',Auth::id())->get();
      // $placement= User::where('left_side','=','null')->orWhere('middle_side','=','null')->orWhere('right_side','=','null')->get();
      // dd($placement);
      return view('frontend.pages.sponsor_lists',compact('users'));
    }
    public function getUser(Request $request)
    {

        $userName = User::where('user_name','like',$request->search)->select('id','user_name')->first();
        if ($userName){
            return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName],200);
        }else{
            return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
        }

    }
}
