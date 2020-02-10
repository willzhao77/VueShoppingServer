<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
  public function newsList()
  {
    // define default domain, added to img path before output
    $localdomain = 'http://localhost:8000/';
    $news = News::All();

    foreach($news as $newsitem){
      $newsitem->img = $localdomain . $newsitem->img;
    }

    $result = new class{};
    $result->status = 0;
    $result->message = $news;
    return json_encode($result);
  }

  public function newsInfo($id){
    $localdomain = 'http://localhost:8000/';
    // increase clicked number
    $news = News::where('id', $id)->increment('clicked', 1);
    $news = News::find($id);

    $result = new class{};
    $result->status = 0;
    $result->message = $news;
    return json_encode($result);
  }
}
