@extends('adminframe')
@section('content')

<div class="">
  <form action="{{ url('back/sharecategory') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">Title:</label><input type="title" name="title" value="">
    </div>

    <button class="btn btn-lg btn-info">Add Title</button>
  </form>
</div>

@endsection
