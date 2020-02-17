<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShopItemComment;

class ShopItemCommentController extends Controller
{


  public function index()
  {
  }



  public function store(Request $request)
  {
    $this->validate($request, [
      'id'=> 'required',
      'name' => 'required',
      'content' => 'required',
    ]);

    $shopitemcomment = new ShopItemComment;
    $shopitemcomment->item_id = $request->get('id');
    $shopitemcomment->name = $request->get('name');
    $shopitemcomment->content = $request->get('content');

    if($shopitemcomment->save())
    {
      return redirect('/api/shopitemcomment');
    }else{
      return redirect()->back()->withInput()->withErrors('Create comment faild.');
    }
  }

  public function show($id)
  {
    $comments = ShopItemComment::orderBy('created_at', 'desc')->where('item_id', $id)->paginate(3);
    $result = new class{};
    $result->status = 0;
    $result->message = $comments;
    return json_encode($result);
  }





}
