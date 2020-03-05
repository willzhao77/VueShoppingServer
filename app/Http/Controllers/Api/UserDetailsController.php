<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\UserDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // dd($token);
      //   $user = User::where('api_token', $token)->first();
      //   return $user;
      return "index";
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
      // front end send request with api_token to request user details.
      // http://127.0.0.1:8000/api/userdetails/ + api_token


      $user = User::where('api_token', hash('sha256', $api_token))->with('toDetails')->first();

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
        return "edit";
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

      $user = User::where('api_token', hash('sha256', $api_token))->with('toDetails')->first();

      // dd($user);

      // return $user->id;
      // $user->toDetails->user_id = $user->id;
      // return 'ok';
  // return $user->id;
      if($user->toDetails != '')
      {

        $user->toDetails->name = $request->get('name');
        $user->toDetails->address = $request->get('address');
        $user->toDetails->mobile = $request->get('mobile');

        if ($user->toDetails->save())
        {
          return "saved";
        } else {
          return "failed";
        }
      }else{

          $userDetails = new UserDetails;

          $userDetails->user_id = $user->id;
          $userDetails->name = $request->get('name');
          $userDetails->address = $request->get('address');
          $userDetails->mobile = $request->get('mobile');
          if ($userDetails->save())
          {
            return "saved";
          } else {
            return "failed";
          }

      }



        // $this->validate($request, [
        // 'name' => 'required',
        // 'address' => 'required',
        // 'mobile' => 'required',
        // ]);
        //
        // if($user->to_details){
        //
        // }else{
        //   $user = new UserDetails;
        //   $user->user_id = $id;
        // }
        //
        //



        //
        // $user = UserDetails::where("user_id", $id)->first();
        // if($user){
        //
        // }else{
        //   $user = new UserDetails;
        //   $user->user_id = $id;
        // }
        //
        // $user->name = $request->get('name');
        // $user->address = $request->get('address');
        // $user->mobile = $request->get('mobile');
        //
        // if ($user->save())
        // {
        //   return "saved";
        // } else {
        //   return "failed";
        // }

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
