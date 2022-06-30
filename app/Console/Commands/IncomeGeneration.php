<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\IncomeWallet;

use App\Models\User;
use App\Models\Package;
use App\Models\Purchase;
use Carbon\Carbon;
use DateTime;
use App\Models\Generation;

use function Sodium\add;
use Auth;

class IncomeGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'bonus:daily';

    /**
     * The console command description.
     *
     * @var string
     */

      protected $description = 'Daily Income Generation bonus';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $incomewallet= IncomeWallet::where('method','!=','Daily Bonus')->get();
      //dd($incomewallet);
      //dd($incomewallet);
      //$daily_bonus= User::where('id',Auth::id())->first();
      //dd($daily_bonus->packages->price);
      //dd($sponsor_bonus['royality_bonus']);
      $generation= Generation::first();
      $income=[$generation->lvl_1,$generation->lvl_2,$generation->lvl_3,$generation->lvl_4,$generation->lvl_5];
    $users= User::all();
    foreach ($users as $user) {
      $placement_id= $user->placement_id;
      $calculation= IncomeWallet::where('method','!=','Daily Bonus')->whereDate('created_at',Carbon::today())->where('user_id',2)->sum('amount');
      //dd($calculation);
      $i=0;
      while($i < 5 && $placement_id != ''){

          $user = User::where('user_name',$placement_id)->first('id');
          $activation_status=User::where('id',$user->id)->first();
          if ($activation_status->status== 1) {
            $bonus_amount = new IncomeWallet();
            $bonus_amount->user_id = (int)$user->id;
            $bonus_amount->amount = $calculation*($income[$i]/100);
            $bonus_amount->method = 'Income Generation Bonus';
            $bonus_amount->type = 'Credit';
            $bonus_amount->status = 'approve';
            $bonus_amount->level = $i+1;
            $bonus_amount->description= ($calculation*($income[$i]/100)) . '$'. ' Income Generation Bonus amount is credited ';
            //dd($placement_id);
              $bonus_amount->save();


          }


          $next_id= $this->find_placement_id($placement_id);
         // dd($next_id,$placement_id);
          $placement_id = $next_id;
          $i++;
      }
    }
      $this->info('Successfully added daily bonus.');
}
public function find_placement_id($placement_id){

    $user_id = User::where('user_name',$placement_id)->first();
    return $user_id->placement_id;
}
}
