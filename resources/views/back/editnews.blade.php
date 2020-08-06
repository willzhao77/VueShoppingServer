@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/news/'.$newsitem->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">News ID:</label><label>{{ $newsitem->id }}</label>
    </div>

    <div class="">
        <img src="../../../{{ $newsitem->img }}" alt="">
    </div>
    <div class="">
      <label for="">Picture:</label><input type="file" accept="image/*" name="image">
    </div>
    <div class="">
      <label for="">Title:</label><input type="text" name="title" value="{{ $newsitem->title }}">
    </div>
    <div class="">
      <label for="">Conetent:</label><textarea name="content" >{{ $newsitem->content }}</textarea>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $newsitem->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
