<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;

class Purchase extends Model
{
    use HasFactory;
    protected $table ="purchases";
    public function package()
    {

         return $this->belongsTo(Package::class, 'package_id');

    }
}
