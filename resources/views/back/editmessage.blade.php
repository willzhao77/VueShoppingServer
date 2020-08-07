@extends('home')
@section('content1')
<div class="">
  <form action="{{ url('back/message/'.$message->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Message ID:</label>
      <div class="col-sm-5">
        <p>{{ $message->id}}</p>
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title:</label>
      <div class="col-sm-5">

      <input type="" name="title" value="{{ $message->title }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Sender:</label>
      <div class="col-sm-5">
        <input type="" name="sender" value="{{ $message->sender }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Receiver:</label>
      <div class="col-sm-5">
        <input type="" name="receiver" value="{{ $message->receiver }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Conetent:</label>
      <div class="col-sm-5">
        <textarea name="content" class="form-control">{{ $message->content }}</textarea>
      </div>
    </div>

    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $message->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
