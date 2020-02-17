<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShopItemComment;

class ShopItemCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('back/showshopitemcomment')->with('comments', ShopItemComment::orderBy('created_at', 'desc')->paginate(5));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/createshopitemcomment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'item_id'=> 'required',
        'name' => 'required',
        'content' => 'required',
      ]);

      $shopitemcomment = new ShopItemComment;
      $shopitemcomment->item_id = $request->get('item_id');
      $shopitemcomment->name = $request->get('name');
      $shopitemcomment->content = $request->get('content');

      if($shopitemcomment->save())
      {
        return redirect('/back/shopitemcomment');
      }else{
        return redirect()->back()->withInput()->withErrors('Create comment faild.');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('back/editshopitemcomment')->with('comment', ShopItemComment::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $shopitemcomment = ShopItemComment::find($id);
      $shopitemcomment->item_id = $request->get('item_id');
      $shopitemcomment->name = $request->get('name');
      $shopitemcomment->content = $request->get('content');

      if($shopitemcomment->save())
      {
        return redirect('/back/shopitemcomment');
      }else{
        return redirect()->back()->withInput()->withErrors('update comment faild');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      ShopItemComment::find($id)->delete();
      return redirect()->back();
    }
}
