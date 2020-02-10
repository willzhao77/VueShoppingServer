<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShareCategory;

class ShareCategoryController extends Controller
{
  public function index()
  {

    $sharecategory = ShareCategory::All();

      $result = new class{};
    $result->status = 0;
    $result->message = $sharecategory;
    return json_encode($result);
  }
}
