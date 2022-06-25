<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use App\Models\Package;
use Auth;
use App\Models\Purchase;
use App\Models\IncomeWallet;
use Carbon\Carbon;
use DB;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
      //dd($request);
      $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      $package= Package::where('id',$request->package_id)->first();

      if ($data['sum_deposit'] < $package->package_price ) {
          return back()->with('activation_failed', 'Insufficent Fund!!');
      }else {

        $user_name= User::where('id',$request->user_id)->select('user_name')->first();
        $place= User::where('id',$request->placement_id)->select('user_name')->first();


        $activate= User::find($request->user_id);
        $activate->placement_id= $place->user_name;
        $activate->position=$request->position;
        $activate->status= 1;
        $activate->save();
        $placement= User::find($request->placement_id);
        //dd($placement->left_count);
        if ($request->position==1) {
          $placement->left_side=$user_name->user_name;

        }elseif ($request->position==2) {
            $placement->middle_side=$user_name->user_name;

        }else {
            $placement->right_side=$user_name->user_name;

        }
        $placement->save();
        $bal_ded= new AddMoney();
        $bal_ded->user_id= Auth::id();
        $bal_ded->amount= -($package->package_price);
        $bal_ded->method= 'Activation Charge';
        $bal_ded->type= 'Debit';
        $bal_ded->description= $package->package_price. '$ is deducted for activating user '. $user_name->user_name;
        $bal_ded->status= 'approve';
        $bal_ded->save();
        $sponsor_id= User::where('id',$request->user_id)->first();
        $activation_status= User::where('id',$sponsor_id->sponsor)->first();
        if ($activation_status->status == 1) {
          $sponsor_bonus= new IncomeWallet();
          $sponsor_bonus->user_id= $sponsor_id->sponsor;
          $sponsor_bonus->received_from= $request->user_id;
          $sponsor_bonus->amount= ($package->package_price)*($package->sponsor_bonus/100);
          $sponsor_bonus->method= 'Sponsor Bonus';
          $sponsor_bonus->type= 'Credit';
          $sponsor_bonus->status= 'approve';
          $sponsor_bonus->description= ($package->package_price)*($package->sponsor_bonus/100). '$ Bonus amount is credited for '. $user_name->user_name .' Activation';
          $sponsor_bonus->save();
        }


        $purchase_package= new Purchase();
        $purchase_package->user_id= $request->user_id;
        $purchase_package->package_id= $request->package_id;
        $purchase_package->date= Carbon::now();
        $purchase_package->save();
        $user_data=User::where('id',$request->user_id)->get()->first();
        //dd($user_data->placement_id);
        $this->binary_count($user_data->placement_id,$user_data->position);


        $income=[$package->lvl_1,$package->lvl_2,$package->lvl_3,$package->lvl_4,$package->lvl_5,$package->lvl_6,
      $package->lvl_7,$package->lvl_8,$package->lvl_9,$package->lvl_10,$package->lvl_11,$package->lvl_12,$package->lvl_13,
    $package->lvl_14,$package->lvl_15];
      $users= User::where('status',1)->get();
      foreach ($users as $user) {
        $placement_id= $user->placement_id;
        //dd($placement_id);
        $i=0;
        while($i < 15 && $placement_id != ''){

            $user = User::where('user_name',$placement_id)->first('id');
            $ac_status=User::where('id',$user->id)->first();
            if ($ac_status->status== 1) {
              $bonus_amount = new IncomeWallet();
              $bonus_amount->user_id = (int)$user->id;
              $bonus_amount->amount = ($income[$i])/4;
              $bonus_amount->method = 'Level Bonus';
              $bonus_amount->type = 'Credit';
              $bonus_amount->status = 'approve';
              $bonus_amount->level = $i+1;
              $bonus_amount->description= (($income[$i])/4) . '$'. ' Generation Bonus amount is credited for '. $user_name->user_name .' Activation';
              $bonus_amount->save();

            }



            $next_id= $this->find_placement_id($placement_id);
           // dd($next_id,$placement_id);
            $placement_id = $next_id;
            $i++;
        }
      }


        return back()->with('activation_success', 'User Successfully Activated!!');
      }

    }
    public function binary_count($placement_id,$pos)
    {
        //dd($placement_id,$pos);
        if ($pos == 1){
            $pos = 'left_count';

        }elseif ($pos== 2) {
            $pos = 'middle_count';
        }

        else{
            $pos = 'right_count';

        }

        while($placement_id != '' && $pos != ''){

            DB::statement("UPDATE users SET $pos = `$pos`+1 WHERE user_name = '$placement_id'");


            //$this->is_pair_generate($placement_id);
            $pos= $this->find_position_id($placement_id);

            $placement_id= $this->find_placement_id($placement_id);

        }

    }
    public function find_position_id($placement_id){

        $user_id = User::where('user_name',$placement_id)->first();

        $pos= $user_id->position;
        if ($pos == 1){
            $pos = 'left_count';
        }elseif($pos == 2){
            $pos = 'middle_count';
        }elseif($pos == 3) {
          $pos= 'right_count';
        }

        //return $pos;

    }

    public function find_placement_id($placement_id){

        $user_id = User::where('user_name',$placement_id)->first();
        return $user_id->placement_id;
    }
    public function getPlacement(Request $request)
    {
      //dd($request);

        $userName = User::where('user_name','like',$request->search)->select('id','user_name')->first();
        if ($userName){
            return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName],200);
        }else{
            return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
        }

    }
}
