@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/sharecomment') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">Share Item ID</label><input type="" name="share_id" value="">
    </div>
    <div class="">
      <label for="">name</label><input type="" name="name" value="">
    </div>
    <div class="">
      <label for="">Conetent:</label><textarea name="content" >Enter text here...</textarea>
    </div>
    <button class="btn btn-lg btn-info">Add NewsComment</button>
  </form>
</div>

@endsection
