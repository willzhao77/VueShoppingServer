@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/news/'.$newsitem->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">News ID:</label>
      <div class="col-sm-5">
        <label>{{ $newsitem->id }}</label>
      </div>
    </div>

    <div class="form-group row">
        <img src="../../../{{ $newsitem->img }}" alt="" width="200px">
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Picture:</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="image">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title:</label>
      <div class="col-sm-5">
        <input type="text" name="title" value="{{ $newsitem->title }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Conetent:</label>
      <div class="col-sm-5">
        <textarea name="content" class="form-control">{{ $newsitem->content }}</textarea>
      </div>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $newsitem->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
