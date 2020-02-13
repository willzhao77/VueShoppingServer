<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShopItem;

class ShopItemController extends Controller
{
  public function shopList(){
    $shoplist = ShopItem::paginate(3);
$localdomain = 'http://localhost:8000/';

    // add domain for display picutures
    foreach($shoplist as &$item)
    {

      $images = explode("|",$item->show_imgs);
      // dd($images);
      foreach($images as &$image)
      {
        $imagefile = new class{};
        $imagefile->src = $localdomain . $image;
        $image = $imagefile;
      }

      $item->show_imgs = $images;

      $item->img = $localdomain . $item->img;
        // dd($items->show_imgs);
    }

    $result = new class{};
    $result->status = 0;
    $result->message = $shoplist;
    return json_encode($result);
  }

  public function show($id)
  {
    // define default domain, added to img path before output
    $localdomain = 'http://localhost:8000/';

    $shopitem = ShopItem::where('id', $id)->first();
    $shopitem->img = $localdomain . $shopitem->img;


    $result = new class{};
    $result->status = 0;
    $result->message = $shopitem;
    return json_encode($result);
  }

  public function showImages($id)
  {
    $localdomain = 'http://localhost:8000/';

    $shopitem = ShopItem::where('id', $id)->first();

    $images = explode("|",$shopitem->show_imgs);

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

  public function showDetails($id)
  {


    $shopitem = ShopItem::where('id', $id)->first();


    $result =  $shopitem;
    $result = new class{};
    $result->status = 0;
    $result->message = $shopitem;


    return json_encode($result);
  }


}
