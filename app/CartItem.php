<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
  protected $guarded = [];
    public function userCart()
    {
      return $this->belongsTo('App\UserCart', 'id',  'cart_id');
    }
}
