@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/shareitem') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Picture</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="image" class="">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title</label>
      <div class="col-sm-5">
        <input type="title" name="title" value="" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Category ID</label>
      <div class="col-sm-5">
      <select name="category_id" class="form-control">
        <option value="" >--- Select Category ---</option>
        @foreach ($categories as $Category)

        <option value="{{ $Category->id }}">{{ $Category->title }}</option>

        @endforeach
      </select>
      </div>
      <label for="" style="color:red">*</label>
    </div>


    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">User Name:</label>
      <div class="col-sm-5">
        <input type="" name="user_name" value="" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">description:</label>
      <div class="col-sm-5">
        <textarea name="description" class="form-control">Enter text here...</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Picture</label><input type="file" accept="image/*" name="images[]" multiple>
    </div>

    <button class="btn btn-lg btn-info">Add News</button>
  </form>
</div>

@endsection
