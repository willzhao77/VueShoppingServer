@extends('adminframe')
@section('content')

<div class="">
  <form action="{{ url('back/message/'.$message->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">Message ID:</label><p>{{ $message->id}}</p>
    </div>

    <div class="">
      <label for="">Title:</label><input type="" name="title" value="{{ $message->title }}">
    </div>
    <div class="">
      <label for="">Sender:</label><input type="" name="sender" value="{{ $message->sender }}">
    </div>
    <div class="">
      <label for="">Receiver:</label><input type="" name="receiver" value="{{ $message->receiver }}">
    </div>

    <div class="">
      <label for="">Conetent:</label><textarea name="content" >{{ $message->content }}</textarea>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $message->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
