<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wallet;

class UserPayment extends Model
{
    use HasFactory;
      protected $table ="user_payments";
      public function payment()
      {
          return $this->belongsTo(Wallet::class,'payment_method_id');
      }
}
