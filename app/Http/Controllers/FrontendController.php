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
      return view('frontend.pages.sponsor_lists',compact('users'));
    }
}
