@extends('adminframe')
@section('content')

<div class="">
  <form action="{{ url('back/sharecomment/'.$comment->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">Share Item ID:</label><input type="" name="share_id" value="{{ $comment->share_id }}">
    </div>
    <div class="">
      <label for="">Name:</label><input type="" name="name" value="{{ $comment->name }}">
    </div>
    <div class="">
      <label for="">Conetent:</label><textarea name="content" >{{ $comment->content }}</textarea>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $comment->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
