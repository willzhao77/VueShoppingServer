<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SlideShow;

class SlideShowController extends Controller
{
    public function index()
    {
      // define default domain, added to img path before output
      // $localdomain = 'http://localhost:8000/';
      $localdomain = config('global.shoppingserverURL');

      $slides = SlideShow::All();

      foreach($slides as $slide){
        $slide->img = $localdomain . $slide->img;
      }

      $result = new class{};
      $result->status = 0;
      $result->message = $slides;
      return json_encode($result);
    }
}
