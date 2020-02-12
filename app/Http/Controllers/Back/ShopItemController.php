<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShopItem;

class ShopItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('back/showshopitem')->with('shopitems', ShopItem::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('back/createshopitem');
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
      'goods_no' => 'required',
      'market_price' => 'required',
      'sell_price' => 'required',
      'content' => 'required',
    ]);

    $image = $request->file('image');
    $imagename = time() . $image->getClientOriginalName();
    $destinationPath = 'img/shop/';
    $image->move($destinationPath, $imagename);

    $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=time() . $file->getClientOriginalName();
                $file->move($destinationPath, $name);
                $images[]='img/shop/' . $name;
            }
        }



    $shopitem = new ShopItem;
    $shopitem->img = 'img/shop/' . $imagename;
    $shopitem->show_imgs = implode("|",$images);
    $shopitem->title = $request->get('title');
    $shopitem->goods_no = $request->get('goods_no');
    $shopitem->stock_quantity = $request->get('stock_quantity');
    $shopitem->market_price = $request->get('market_price');
    $shopitem->sell_price = $request->get('sell_price');
    $shopitem->content = $request->get('content');

    if ($shopitem->save())
    {
      return redirect('/back/shopitem');
    } else {
      return redirect()->back()->withInput()->withErrors('Item save faild');
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
      return view('back/editshopitem')->with('shopitem', ShopItem::find($id));
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
      $shopitem = ShopItem::find($id);

      $shopitem->title = $request->get('title');
      $shopitem->goods_no = $request->get('goods_no');
      $shopitem->market_price = $request->get('market_price');
      $shopitem->sell_price = $request->get('sell_price');
      $shopitem->stock_quantity = $request->get('stock_quantity');
      $shopitem->content = $request->get('content');

      // if user selected item photo, upload photo
      if ($request->hasFile('image'))
      {
        $image = $request->file('image');
        $imagename =time() . $image->getClientOriginalName();
        $destinationPath = 'img/shop/';
        $image->move($destinationPath, $imagename);
        $shopitem->img = 'img/shop/' . $imagename;
      }

      if ($shopitem->save()) {
            return redirect('/back/shopitem');
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
      ShopItem::find($id)->delete();
      return redirect()->back();
    }
}
