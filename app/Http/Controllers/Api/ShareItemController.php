<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShareItem;

class ShareItemController extends Controller
{
    public function shareList($cateId){
      // define default domain, added to img path before output
      $localdomain = 'http://localhost:8000/';
      if(!$cateId){
        $sharelist = ShareItem::All();
      }else{
        $sharelist = ShareItem::where('category_id', $cateId)->get();
      }
      foreach($sharelist as $item){
        $item->img = $localdomain . $item->img;
      }

      $result = new class{};
      $result->status = 0;
      $result->message = $sharelist;
      return json_encode($result);
    }

    public function show($id)
    {
      // define default domain, added to img path before output
      $localdomain = 'http://localhost:8000/';

      $shareitem = ShareItem::where('id', $id)->first();


      $shareitem->img = $localdomain . $shareitem->img;


      $result = new class{};
      $result->status = 0;
      $result->message = $shareitem;
      return json_encode($result);
    }

    public function showImages($id)
    {
      $localdomain = 'http://localhost:8000/';

      $shareitem = ShareItem::where('id', $id)->first();

      $images = explode("|",$shareitem->show_imgs);

      // define default domain, added to img path before output
      $localdomain = 'http://localhost:8000/';
      foreach($images as &$image){
        $imagefile = new class{};
        $imagefile->src = $localdomain . $image;
        $image = $imagefile;
      }

      $result = new class{};
      $result->status = 0;
      $result->message = $images;
      return json_encode($result);


    }
}
