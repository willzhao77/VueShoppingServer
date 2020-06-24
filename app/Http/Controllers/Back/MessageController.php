<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back/showmessage')->with('messages', Message::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('back/createmessage');
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
        'sender'      => 'required',
        'receiver'    => 'required',
        'content'     => 'required',
      ]);

      $message = new Message;
      $message->title = $request->get('title');
      $message->sender = $request->get('sender');
      $message->content = $request->get('content');
      if($request->get('receiver') === 'ALL'){
        $message->if_all = true;
        $message->receiver = '';
      }else{
        $message->if_all = false;
        $message->receiver = $request->get('receiver');
      }
      $message->if_read  = false;
      $message->if_replied = false;

      if($message->save())
      {
        return redirect('/back/message');
      }else{
        return redirect()->back()->withInput()->withErrors('Create new message faild.');
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
      return view('back/editmessage')->with('message', Message::find($id));
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
      $message = Message::find($id);
      $message->title = $request->get('title');
      $message->sender = $request->get('sender');
      $message->receiver = $request->get('receiver');
      $message->content = $request->get('content');

      if($message->save())
      {
        return redirect('/back/message');
      }else{
        return redirect()->back()->withInput()->withErrors('update message faild');
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
      Message::find($id)->delete();
      return redirect()->back();
    }
}
