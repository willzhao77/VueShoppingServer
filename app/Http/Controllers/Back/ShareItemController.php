<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShareItem;
use App\ShareCategory;

class ShareItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back/showshareitem')->with('shareitems', ShareItem::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/createshareitem')->with("categories", ShareCategory::all());
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
          'title'       => 'required',
          'user_name'   => 'required',
          'image'         => 'required',
          'category_id' => 'required',
          'description' => 'required',
        ]);

        $image = $request->file('image');
        $imagename = time() . $image->getClientOriginalName();
        $destinationPath = 'img/share/';
        $image->move($destinationPath, $imagename);



        $images=array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name=time() . $file->getClientOriginalName();
                    $file->move($destinationPath, $name);
                    $images[]='img/share/' . $name;
                }
            }



        $shareitem = new ShareItem;
        $shareitem->title = $request->get('title');
        $shareitem->user_name = $request->get('user_name');
        $shareitem->img = 'img/share/' . $imagename;
        $shareitem->show_imgs = implode("|",$images);
        $shareitem->category_id = $request->get('category_id');
        $shareitem->description = $request->get('description');

        if ($shareitem->save())
        {
          return redirect('/back/shareitem');
        } else {
          return redirect()->back()->withInput()->withErrors('share item save faild');
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
          return view('back/editshareitem')->with('shareitem', ShareItem::find($id))->with("categories", ShareCategory::all());;
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
      $shareitem = ShareItem::find($id);
      $shareitem->title = $request->get('title');
      $shareitem->user_name = $request->get('user_name');
      $shareitem->category_id = $request->get('category_id');
      $shareitem->description = $request->get('description');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename =time() . $image->getClientOriginalName();
        $destinationPath = 'img/share/';
        $image->move($destinationPath, $imagename);
        $shareitem->img = 'img/share/' . $imagename;
      }

      if ($shareitem->save()) {
            return redirect('/back/shareitem');
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
        ShareItem::find($id)->delete();
        return redirect()->back();
    }
}
