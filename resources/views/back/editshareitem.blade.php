@extends('home')
@section('content1')
<div class="">
  <form action="{{ url('back/shareitem/'.$shareitem->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">News ID:</label>
      <label class="col-sm-1 col-form-label">{{ $shareitem->id }}</label>
    </div>

    <div class="form-group row">
        <img src="../../../{{ $shareitem->img }}" alt="" width="200px">
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Main Picture:</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="image">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title:</label>
      <div class="col-sm-5">
        <input type="" name="title" value="{{ $shareitem->title }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Category ID</label>
      <div class="col-sm-5">
        <select name="category_id" class="form-control">
          <option value="">--- Select Category ---</option>
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
        <input type="" name="user_name" value="{{ $shareitem->user_name }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Conetent:</label>
      <div class="col-sm-5">
        <textarea name="description" class="form-control">{{ $shareitem->description }}</textarea>
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Show Picture:</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="images" multiple>
      </div>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $shareitem->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
