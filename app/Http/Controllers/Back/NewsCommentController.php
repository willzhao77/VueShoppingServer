<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsComment;

class NewsCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('back/shownewscomment')->with('comments', NewsComment::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('back/createnewscomment');
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
        'newsid'=> 'required',
        'name' => 'required',
        'content' => 'required',
      ]);

      $newscomment = new NewsComment;
      $newscomment->newsid = $request->get('newsid');
      $newscomment->name = $request->get('name');
      $newscomment->content = $request->get('content');

      if($newscomment->save())
      {
        return redirect('/back/newscomment');
      }else{
        return redirect()->back()->withInput()->withErrors('Create new comment faild.');
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
       $comments = NewsComment::orderBy('created_at', 'desc')->where('newsid', $id)->paginate(3);
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
      return view('back/editnewscomment')->with('comment', NewsComment::find($id));
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
      $newscomment = NewsComment::find($id);
      $newscomment->newsid = $request->get('newsid');
      $newscomment->name = $request->get('name');
      $newscomment->content = $request->get('content');

      if($newscomment->save())
      {
        return redirect('/back/newscomment');
      }else{
        return redirect()->back()->withInput()->withErrors('update news comment faild');
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
      NewsComment::find($id)->delete();
      return redirect()->back();
    }
}
