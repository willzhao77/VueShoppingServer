@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/sharecategory/'.$sharecategory->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">ID:</label>
      <label for="">{{ $sharecategory->id }}</label>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title:</label>
      <div class="col-sm-5">
        <input type="" name="title" value="{{ $sharecategory->title }}" class="form-control">
      </div>
    </div>

    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $sharecategory->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
