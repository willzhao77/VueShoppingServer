@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/sharecategory') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title:</label>
      <div class="col-sm-5">
        <input type="title" name="title" value="" class="form-control">
      </div>
    </div>

    <button class="btn btn-lg btn-info">Add Title</button>
  </form>
</div>

@endsection
