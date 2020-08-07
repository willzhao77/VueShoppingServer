@extends('home')
@section('content1')

<div class="">
  <form action="{{ url('back/shopitem') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Picture</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="image">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Title</label>
      <div class="col-sm-5">
        <input type="" name="title" value="" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Goods Number</label>
      <div class="col-sm-5">
        <input type="" name="goods_no" value="" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Market Price</label>
      <div class="col-sm-5">
        <input type="" name="market_price" value="" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Sell Price</label>
      <div class="col-sm-5">
        <input type="" name="sell_price" value="" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Conetent:</label>
      <div class="col-sm-5">
        <textarea name="content" class="form-control">Enter text here...</textarea>
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Goods Quantity</label>
      <div class="col-sm-5">
        <input type="" name="stock_quantity" value="" class="form-control">
      </div>
    </div>


    <div class="form-group row">
      <label for="" class="col-sm-1 col-form-label">Picture</label>
      <div class="col-sm-5">
        <input type="file" accept="image/*" name="images[]" multiple>
      </div>
    </div>

    <button class="btn btn-lg btn-info">Add Item</button>
  </form>
</div>

@endsection
