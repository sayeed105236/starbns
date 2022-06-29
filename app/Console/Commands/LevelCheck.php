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
use DB;

use function Sodium\add;
use Auth;

class LevelCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
  protected $signature = 'level:check';

    /**
     * The console command description.
     *
     * @var string
     */
      protected $description = 'Level Check';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $level= IncomeWallet::where('method','Level Bonus')->get();
      foreach ($level as $row) {
        $duplicates = DB::table('income_wallets')-> where('method','Level Bonus')->where('user_id',$row->user_id)// replace table by the table name where you want to search for duplicated values
                ->select('id', 'received_from') // name is the column name with duplicated values
                ->whereIn('received_from', function ($q){
                  $q->select('received_from')
                  ->from('income_wallets')
                  ->groupBy('received_from')
                  ->havingRaw('COUNT(*) > 1');
                })
                ->orderBy('received_from')
                ->orderBy('id','desc') // keep smaller id (older), to keep biggest id (younger) replace with this ->orderBy('id', 'desc')
                ->get();

  $value = "";

  // loop throuht results and keep first duplicated value
  foreach ($duplicates as $duplicate) {
    if($duplicate->received_from === $value)
    {
      DB::table('income_wallets')->where('id', $duplicate->id)->delete(); // comment out this line the first time to check what will be deleted and keeped
      echo "$duplicate->received_from with id $duplicate->id deleted! \n";
    }
    else
      echo "$duplicate->received_from with id $duplicate->id keeped \n";
    $value = $duplicate->received_from;
  }
        }
      }

      //dd($incomewallet);
      //dd($incomewallet);
      //$daily_bonus= User::where('id',Auth::id())->first();
      //dd($daily_bonus->packages->price);
      //dd($sponsor_bonus['royality_bonus']);



}
