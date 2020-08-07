@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/shopitem/'.$shopitem->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Item ID:</label>
      <label class="col-sm-1 col-form-label">{{ $shopitem->id }}</label>
    </div>

    <div class="form-group row">
        <img src="../../../{{ $shopitem->img }}" alt="" width="200px">
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Picture:</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="image">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title:</label>
      <div class="col-sm-5">
        <input type="text" name="title" value="{{ $shopitem->title }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Goods Number:</label>
      <div class="col-sm-5">
        <input type="text" name="goods_no" value="{{ $shopitem->goods_no }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Market Price:</label>
      <div class="col-sm-5">
        <input type="text" name="market_price" value="{{ $shopitem->market_price }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Sell Price:</label>
      <div class="col-sm-5">
        <input type="text" name="sell_price" value="{{ $shopitem->sell_price }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Stock Quantity:</label>
      <div class="col-sm-5">
        <input type="text" name="stock_quantity" value="{{ $shopitem->stock_quantity }}" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Conetent:</label>
      <div class="col-sm-5">
        <textarea name="content" class="form-control">{{ $shopitem->content }}</textarea>
      </div>
    </div>
    <input type="hidden" name="id" class="form-control" style="width: 300px;" value="{{ $shopitem->id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection
