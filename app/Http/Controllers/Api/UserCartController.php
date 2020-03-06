<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserCart;

class userCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($api_token)
    {
      $user = User::where('api_token', hash('sha256', $api_token))->with('toCart')->first();

      return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $api_token)
    {
      $user = User::where('api_token', hash('sha256', $api_token))->with('toCart')->first();
      if($user){ // if find the user by user's $token
        $this->validate($request, [
        'items' => 'required',
        ]);



        if($user->toCart != '')
        {
          $userData = $request->get('items');
          // return ($userData);
          $addItem = json_decode($userData);  // get add item add from user's request

          $oldCart =  json_decode($user->tocart->items); //get user's old cart data
          $flag = false;
          foreach ($oldCart as $item){
            if($item->id == $addItem[0]->id){
              $item->count += $addItem[0]->count;
              $flag = true;
            }
          }

          if(!$flag){
            // return gettype($oldCart);

            array_push($oldCart, $addItem[0]);
            // return $oldCart;
          }


          $user->toCart->items = json_encode($oldCart);
          if ( $user->toCart->save())
          {
            return "saved";
          } else {
            return "failed";
          }

          // $user->toDetails->name = $request->get('name');
          // $user->toDetails->address = $request->get('address');
          // $user->toDetails->mobile = $request->get('mobile');
          // if ($user->toDetails->save())
          // {
          //   return "saved";
          // } else {
          //   return "failed";
          // }
        }else{
          $userCart = new UserCart;
          $userCart->user_id = $user->id;
          $userCart->items =  $request->get('items');
          if ($userCart->save())
          {
            return "saved";
          } else {
            return "failed";
          }
        }
      }else{
        // Not find the user by user's $token
        return "no user";
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
        //
    }
}
