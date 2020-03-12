<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserCart;
use App\CartItem;

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
      $user = User::where('api_token', hash('sha256', $api_token))->with('userCart')->first();
      // dd($user->userCart->cartItem);
      $cartItems = $user->userCart->cartItem;
      $cartItems = json_encode($cartItems);
      return $cartItems;
      // return $user->userCart();
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

     public function updateNum(Request $request, $api_token)
     {
       // update shopping cart item Number
       $user = User::where('api_token', hash('sha256', $api_token))->with('toDetails')->first();
       if($user){
         return $user->cartitem->id;
         // if find the user by user's $token
         $cartItem = CartItem::where();
       }else{
         // if NOT find the user by user's $token
       }
     }



    public function update(Request $request, $api_token)
    {
      // return "begin";
      $user = User::where('api_token', hash('sha256', $api_token))->with('userCart')->first();

      if($user){ // if find the user by user's $token
        $this->validate($request, [
        'items' => 'required',
        ]);
        // return "find user";
        $userData = $request->get('items');
        // return ($userData);
        $addItem = json_decode($userData);  // get add item add from user's request


        if($user->userCart != '')  // if this user has cart info
        {
          $cartItems = $user->userCart->cartItem()->get();
          if(count($cartItems) == 0){  //this cart has no items.
            $cartItem = new CartItem;
            $cartItem->cart_id = $user->userCart->id;
            $cartItem->item_id = $addItem[0]->id;
            $cartItem->quantity = $addItem[0]->count;
            $cartItem->selected = $addItem[0]->selected;
            $cartItem->state = '';
            if(!$cartItem->save()){
              return "faild to save Cart item";
            }else{
              return "saved";
            }
        }else{//this cart has items.
          if($request->get('opt') == 'select')
          {
             $cartID = $cartItems = $user->userCart->id;  // get cart ID
             $itemID = $addItem[0]->id;     //  get item ID
             // return "before00";
            $cartItem= CartItem::where('cart_id', $cartID)->where("item_id", $addItem[0]->id)->first();
            $oldValue = $cartItem->selected;   // get old selected value
            $newValue = ~($cartItem->selected)+2;   // 0, 1 change
  
            $cartItem->selected = $newValue;
            if(!$cartItem->save()){
              return "faild to save Cart item";
            }else{
              return "saved";
            }
          }


          foreach($cartItems as $cartItem) {
            if($cartItem->item_id == $addItem[0]->id) // if Item exist.Only add quantity
            {
              if($request->get('opt') == 'add')   // check if add or overwrite quantity
              {

                $cartItem->quantity += $addItem[0]->count;
              }else{

                $cartItem->quantity = $addItem[0]->count;
              }
              if(!$cartItem->save()){
                return "faild to save Cart item";
              }else{
                return "saved";
              }

            }
          }

          $cartItem = new CartItem;
          $cartItem->cart_id = $user->userCart->id;
          $cartItem->item_id = $addItem[0]->id;
          $cartItem->quantity = $addItem[0]->count;
          $cartItem->selected = $addItem[0]->selected;
          $cartItem->state = '';
          if(!$cartItem->save()){

            return "faild to save Cart item";
          }else{

            return "saved";
          }
        }
        }else{   // if this user has no cart info

          $userCart = new UserCart;
          $cartItem = new CartItem;

          $userCart->user_id = $user->id;

          $userCart->save();
          // return $userCart;
          $cartItem->cart_id = $userCart->id;
          $cartItem->item_id = $addItem[0]->id;
          $cartItem->quantity = $addItem[0]->count;
          $cartItem->selected = $addItem[0]->selected;
          $cartItem->state = '';


          if(!$cartItem->save()){
            return "faild to save User Cart";
          }

          if ($userCart->save())
               {
                 return "saved";
               } else {
                 return "failed to save cart item";
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
    public function destroy(Request $request, $api_token)
    {
     $delItemId = $request->get('itemID');
     $user = User::where('api_token', hash('sha256', $api_token))->with('userCart')->first();
     $cartId = $user->userCart->id;
     // return $cartId;
     CartItem::where('item_id', $delItemId)->where('cart_id', $cartId)->delete();
     return "removed";
    }

}
