@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/sharecomment/'.$comment->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Share Item ID:</label>
      <p class="col-sm-1 col-form-label">{{ $comment->toShareItem->id }}</p>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Name:</label>
      <div class="col-sm-5">
        <input type="" name="name" value="{{ $comment->name }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Conetent:</label>
      <div class="col-sm-5">
        <textarea name="content" class="form-control">{{ $comment->content }}</textarea>
      </div>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $comment->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
