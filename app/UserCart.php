<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
  public function toUser()
  {
    return $this->belongsTo('App\User', 'id',  'user_id');
  }
}
