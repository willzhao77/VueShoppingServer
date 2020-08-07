@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/news') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Picture</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="image" class="">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title</label>
      <div class="col-sm-5">
        <input type="title" name="title" value="" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Conetent:</label>
      <div class="col-sm-5">
        <textarea name="content" class="form-control">Enter text here...</textarea>
      </div>
    </div>
    <button class="btn btn-lg btn-info">Add News</button>
  </form>
</div>
@endsection
