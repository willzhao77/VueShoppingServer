@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/slideshow/'.$slideshowitem->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">Slide Show ID:</label><label>{{ $slideshowitem->id }}</label>
    </div>

    <div class="">
        <img src="../../../{{ $slideshowitem->img }}" alt="">
    </div>
    <div class="">
      <label for="">Picture</label><input type="file" accept="image/*" name="image">
    </div>
    <div class="">
      <label for="">URL</label><input type="text" name="url" value="{{ $slideshowitem->url }}">
    </div>


    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $slideshowitem->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
