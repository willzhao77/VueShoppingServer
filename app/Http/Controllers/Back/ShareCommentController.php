<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShareComment;

class ShareCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('back/showsharecomment')->with('comments', ShareComment::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/createsharecomment');
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
        'share_id'=> 'required',
        'name' => 'required',
        'content' => 'required',
      ]);

      $sharecomment = new ShareComment;
      $sharecomment->share_id = $request->get('share_id');
      $sharecomment->name = $request->get('name');
      $sharecomment->content = $request->get('content');

      if($sharecomment->save())
      {
        return redirect('/back/sharecomment');
      }else{
        return redirect()->back()->withInput()->withErrors('Create share comment faild.');
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
      $comments = ShareComment::orderBy('created_at', 'desc')->where('share_id', $id)->paginate(3);
      $result = new class{};
      $result->status = 0;
      $result->message = $comments;
      return json_encode($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('back/editsharecomment')->with('comment', ShareComment::find($id));
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
      $sharecomment = ShareComment::find($id);
      $sharecomment->share_id = $request->get('share_id');
      $sharecomment->name = $request->get('name');
      $sharecomment->content = $request->get('content');

      if($sharecomment->save())
      {
        return redirect('/back/sharecomment');
      }else{
        return redirect()->back()->withInput()->withErrors('update share comment faild');
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
      ShareComment::find($id)->delete();
      return redirect()->back();
    }
}
