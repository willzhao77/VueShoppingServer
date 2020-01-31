<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('back/shownews')->with('news', News::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('back/createnews');
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
      'image' => 'required',
      'title' => 'required',
      'content' => 'required',
    ]);

    $image = $request->file('image');
    $imagename = time() . $image->getClientOriginalName();
    $destinationPath = 'img/news/';
    $image->move($destinationPath, $imagename);

    $newsitem = new News;
    $newsitem->img = 'img/news/' . $imagename;
    $newsitem->title = $request->get('title');
    $newsitem->content = $request->get('content');

    if ($newsitem->save())
    {
      return redirect('/back/news');
    } else {
      return redirect()->back()->withInput()->withErrors('news save faild');
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
      return view('back/editnews')->with('newsitem', News::find($id));
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

      $newsitem = News::find($id);
      $newsitem->title = $request->get('title');
      $newsitem->content = $request->get('content');

      // if user selected new photo, upload photo
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename =time() . $image->getClientOriginalName();
        $destinationPath = 'img/slideshow/';
        $image->move($destinationPath, $imagename);
        $newsitem->img = 'img/slideshow/' . $imagename;
      }

      if ($newsitem->save()) {
            return redirect('/back/news');
        } else {
            return redirect()->back()->withInput()->withErrors('update faild！');
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
      News::find($id)->delete();
      return redirect()->back();
    }
}
