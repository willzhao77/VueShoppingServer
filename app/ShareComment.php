<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareComment extends Model
{
  public function toShareItem()
  {
    return $this->hasOne('App\ShareItem', 'id',  'share_id');
  }
}
