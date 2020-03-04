<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
  public function toUser()
  {
    return $this->belongsTo('App\User', 'id',  'user_id');
  }


}
