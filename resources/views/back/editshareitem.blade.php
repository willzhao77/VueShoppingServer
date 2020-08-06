@extends('home')
@section('content1')
<div class="">
  <form action="{{ url('back/shareitem/'.$shareitem->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">News ID:</label><label>{{ $shareitem->id }}</label>
    </div>

    <div class="">
        <img src="../../../{{ $shareitem->img }}" alt="">
    </div>
    <div class="">
      <label for="">Picture:</label><input type="file" accept="image/*" name="image">
    </div>
    <div class="">
      <label for="">Title:</label><input type="" name="title" value="{{ $shareitem->title }}">
    </div>


    <div class="">
      <label for="">Category ID</label>
      <select name="category_id">
        <option value="">--- Select Category ---</option>
        @foreach ($categories as $Category)

        <option value="{{ $Category->id }}">{{ $Category->title }}</option>

        @endforeach
      </select>
      <label for="" style="color:red">*</label>
    </div>



    <div class="">
      <label for="">User Name:</label><input type="" name="user_name" value="{{ $shareitem->user_name }}">
    </div>
    <div class="">
      <label for="">Conetent:</label><textarea name="description" >{{ $shareitem->description }}</textarea>
    </div>

    <hr>
    <div class="">
      <label for="">Picture</label><input type="file" accept="image/*" name="images" multiple>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $shareitem->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
