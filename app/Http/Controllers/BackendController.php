<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
