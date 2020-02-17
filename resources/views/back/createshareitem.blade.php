@extends('adminframe')
@section('content')

<div class="">
  <form action="{{ url('back/shareitem') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">Picture</label><input type="file" accept="image/*" name="image">
    </div>
    <div class="">
      <label for="">Title</label><input type="title" name="title" value="">
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
      <label for="">User Name:</label><input type="" name="user_name" value="">
    </div>
    <div class="">
      <label for="">description:</label><textarea name="description" >Enter text here...</textarea>
    </div>

    <hr/>
    <div class="">
      <label for="">Picture</label><input type="file" accept="image/*" name="images[]" multiple>
    </div>

    <button class="btn btn-lg btn-info">Add News</button>
  </form>
</div>

@endsection
