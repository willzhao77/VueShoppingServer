<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'password','api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function toDetails()
    {
      return $this->hasOne('App\UserDetails', 'user_id',  'id');
    }

    // public function toCart()
    // {
    //   return $this->hasOne('App\UserCart', 'user_id',  'id');
    // }
    public function userCart()
    {
      return $this->hasOne('App\UserCart', 'user_id',  'id');
    }



}
