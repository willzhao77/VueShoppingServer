@extends('home')
@section('content')

<div class="">
  <form action="{{ url('back/message') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">Title:</label><input type="" name="title" value="">
    </div>
    <div class="">
      <label for="">Sender:</label><input type="" name="sender" value="">
    </div>
    <div class="">
      <label for="">Receiver:</label><input type="" name="receiver" value="">
    </div>
    <div class="">
      <label for="">Conetent:</label><textarea name="content" >Enter text here...</textarea>
    </div>
    <button class="btn btn-lg btn-info">Create Message</button>
  </form>
</div>

@endsection
