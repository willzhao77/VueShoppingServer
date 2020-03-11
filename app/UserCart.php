<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
  protected $guarded = [];
  // public function toUser()
  // {
  //   return $this->belongsTo('App\User', 'id',  'user_id');
  // }
  public function user()
  {
    return $this->belongsTo('App\User', 'id',  'user_id');
  }

  public function cartItem()
  {
    return $this->hasMany('App\CartItem', 'cart_id',  'id');
  }
}
