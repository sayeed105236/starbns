<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
  public function PackageList()
  {
    $package= Package::first();
    return view('backend.pages.package_lists',compact('package'));
  }
  public function Update(Request $request)
  {
    //dd($request);
    $package= Package::find($request->id);
    $package->package_name= $request->package_name;
    $package->package_price=$request->package_price;
    $package->roi=$request->roi;
    $package->sponsor_bonus=$request->sponsor_bonus;
    $package->lvl_1=$request->lvl_1;
    $package->lvl_2=$request->lvl_2;
    $package->lvl_3=$request->lvl_3;
    $package->lvl_4=$request->lvl_4;
    $package->lvl_5=$request->lvl_5;
    $package->lvl_6=$request->lvl_6;
    $package->lvl_7=$request->lvl_7;
    $package->lvl_8=$request->lvl_8;
    $package->lvl_9=$request->lvl_9;
    $package->lvl_10=$request->lvl_10;
    $package->lvl_11=$request->lvl_11;
    $package->lvl_12=$request->lvl_12;
    $package->lvl_13=$request->lvl_13;
    $package->lvl_14=$request->lvl_14;
    $package->lvl_15=$request->lvl_15;
    $package->status= $request->status;
    $package->save();
      return back()->with('package_updated','Package Updated Successfully');

  }
}
