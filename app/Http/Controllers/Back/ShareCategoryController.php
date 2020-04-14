<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShareCategory;

class ShareCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back/showsharecategory')->with('sharecategories', ShareCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/createsharecategory');
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
          'title' => 'required'
        ]);

        $sharecategory = new ShareCategory;
        $sharecategory->title = $request->get('title');
        if($sharecategory->save())
        {
          return redirect('/back/sharecategory');
        }else{
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
        return view('back/editsharecategory')->with('sharecategory', ShareCategory::find($id));
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
        $sharecategory = ShareCategory::find($id);
        $sharecategory->title = $request->get('title');
        if ($sharecategory->save()) {
              return redirect('/back/sharecategory');
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
        ShareCategory::find($id)->delete();
        return redirect()->back();
    }
}
