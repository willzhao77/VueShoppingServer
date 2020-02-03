<?php

namespace App\Http\Controllers\Api;

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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // skip csrf token check for all your api links in app/Http/Middleware/VerifyCsrfToken.php by adding the URIs to the $except property. Example:
      //   protected $except = [
      //     '/api/*'
      //     ];


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
        return redirect('/api/newscomment');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
