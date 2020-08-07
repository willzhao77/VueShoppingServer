@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/slideshow') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="form-group form-inline">
      <label for="" class="form-check-label">Picture:</label>
      <input type="file" accept="image/*" name="image" class="">
    </div>


    <div class="form-group form-inline">
      <label for="" class="form-check-label">URL:</label><input type="url" name="url" value="" class="form-control">
    </div>

    <button class="btn btn-lg btn-info">Add Slide</button>
  </form>
</div>





@endsection
