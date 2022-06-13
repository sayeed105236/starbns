<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
      dd($request);
    }
    public function getPlacement(Request $request)
    {
      dd($request);

        $userName = User::where('user_name','like',$request->search)->select('id','user_name')->first();
        if ($userName){
            return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName],200);
        }else{
            return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
        }

    }
}
