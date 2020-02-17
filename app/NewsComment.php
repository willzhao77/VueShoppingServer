<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
  public function toNews()
  {
    return $this->hasOne('App\News', 'id',  'newsid');
  }
}
