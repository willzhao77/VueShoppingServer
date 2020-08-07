@extends('home')
@section('content1')
<div class="">
  <form action="{{ url('back/shopitemcomment') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Shop Item ID</label>
      <div class="col-sm-5">
        <input type="" name="item_id" value="" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">name</label>
      <div class="col-sm-5">
        <input type="" name="name" value="" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Conetent:</label>
      <div class="col-sm-5">
        <textarea name="content" class="form-control">Enter text here...</textarea>
      </div>
    </div>

    <button class="btn btn-lg btn-info">Add NewsComment</button>
  </form>
</div>

@endsection
