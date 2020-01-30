@extends('adminframe')
@section('content')

<div class="">
  <form action="{{ url('back/slideshow') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">Picture</label><input type="file" accept="image/*" name="image">
    </div>
    <div class="">
      <label for="">URL</label><input type="url" name="url" value="">
    </div>

    <button class="btn btn-lg btn-info">Add Slide</button>
  </form>
</div>

@endsection
