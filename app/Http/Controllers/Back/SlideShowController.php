<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SlideShow;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('back/showslide')->with('slides', SlideShow::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('back/createslide');
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
          'url' => 'required',

      ]);

      $image = $request->file('image');
      $imagename =time() . $image->getClientOriginalName();
      $destinationPath = 'img/slideshow/';
      $image->move($destinationPath, $imagename);


      $slideshowitem = new SlideShow;
      $slideshowitem->img = 'img/slideshow/' . $imagename;
      $slideshowitem->url = $request->get('url');


      if ($slideshowitem->save())
      {
        return redirect('/back/slideshow');
      } else {
        return redirect()->back()->withInput()->withErrors('Slide Show save faild');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view("back/editslideshow")->with('slideshowitem', SlideShow::find($id));
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

      $slideshowitem = SlideShow::find($id);
      $slideshowitem->url = $request->get('url');

      // if user selected new photo, upload photo
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename =time() . $image->getClientOriginalName();
        $destinationPath = 'img/slideshow/';
        $image->move($destinationPath, $imagename);
        $slideshowitem->img = 'img/slideshow/' . $imagename;
      }

      if ($slideshowitem->save()) {
            return redirect('/back/slideshow');
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
      SlideShow::find($id)->delete();
      return redirect()->back();
    }
}
