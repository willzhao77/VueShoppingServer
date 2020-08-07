@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/slideshow/'.$slideshowitem->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Slide Show ID:</label>
      <div class="col-sm-5">
        <label class="col-sm-1 col-form-label">{{ $slideshowitem->id }}</label>
      </div>
    </div>

    <div class="form-group row">
        <img src="../../../{{ $slideshowitem->img }}" alt="">
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Picture</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="image">
      </div>

    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">URL</label>
      <div class="col-sm-5">
        <input type="text" name="url" value="{{ $slideshowitem->url }}" class="form-control">
      </div>
    </div>


    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $slideshowitem->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
