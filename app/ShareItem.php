<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareItem extends Model
{
  public function itemCate()
    {
        return $this->hasOne('App\ShareCategory', 'id', 'category_id');
    }
}
