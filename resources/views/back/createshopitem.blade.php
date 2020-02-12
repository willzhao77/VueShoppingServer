@extends('adminframe')
@section('content')

<div class="">
  <form action="{{ url('back/shopitem') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">Picture</label><input type="file" accept="image/*" name="image">
    </div>
    <div class="">
      <label for="">Title</label><input type="" name="title" value="">
    </div>
    <div class="">
      <label for="">Goods Number</label><input type="" name="goods_no" value="">
    </div>

    <div class="">
      <label for="">Market Price</label><input type="" name="market_price" value="">
    </div>

    <div class="">
      <label for="">Sell Price</label><input type="" name="sell_price" value="">
    </div>
    <div class="">
      <label for="">Conetent:</label><textarea name="content" >Enter text here...</textarea>
    </div>
    <div class="">
      <label for="">Goods Quantity</label><input type="" name="stock_quantity" value="">
    </div>
    <hr/>
    <div class="">
      <label for="">Picture</label><input type="file" accept="image/*" name="images[]" multiple>
    </div>
    <button class="btn btn-lg btn-info">Add Item</button>
  </form>
</div>

@endsection
