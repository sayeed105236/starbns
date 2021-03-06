<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'user_name',
        'sponsor',
        'left_side',
        'middle_side',
        'right_side',
        'status'.
        'country',
        'gender',
        'number',
        'postal_code',
        'address',
        'image',
        'placement'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sponsors()
    {
        return $this->belongsTo(User::class,'sponsor');
    }
    public function placements()
    {
        return $this->hasMany(User::class,'placement_id','user_name');
    }
    public function childs()
    {
        return $this->hasMany(User::class,'parent_id');
    }
    // recursive, loads all descendants
    public function position()
    {
        return $this->hasMany(User::class,'placement_id','user_name');
    }
    public function childrenRecursive()
    {
        return $this->position()->with('childrenRecursive');
    }
}
