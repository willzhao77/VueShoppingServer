@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/shopitem/'.$shopitem->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">Item ID:</label><label>{{ $shopitem->id }}</label>
    </div>

    <div class="">
        <img src="../../../{{ $shopitem->img }}" alt="">
    </div>
    <div class="">
      <label for="">Picture:</label><input type="file" accept="image/*" name="image">
    </div>
    <div class="">
      <label for="">Title:</label><input type="text" name="title" value="{{ $shopitem->title }}">
    </div>
    <div class="">
      <label for="">Goods Number:</label><input type="text" name="goods_no" value="{{ $shopitem->goods_no }}">
    </div>
    <div class="">
      <label for="">Market Price:</label><input type="text" name="market_price" value="{{ $shopitem->market_price }}">
    </div>
    <div class="">
      <label for="">Sell Price:</label><input type="text" name="sell_price" value="{{ $shopitem->sell_price }}">
    </div>
    <div class="">
      <label for="">Stock Quantity:</label><input type="text" name="stock_quantity" value="{{ $shopitem->stock_quantity }}">
    </div>

    <div class="">
      <label for="">Conetent:</label><textarea name="content" >{{ $shopitem->content }}</textarea>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $shopitem->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
