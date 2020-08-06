@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/sharecategory/'.$sharecategory->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">ID:</label><label for="">{{ $sharecategory->id }}</label>
    </div>
    <div class="">
      <label for="">Title:</label><input type="" name="title" value="{{ $sharecategory->title }}">
    </div>

    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $sharecategory->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
