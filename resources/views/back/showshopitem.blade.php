@extends('home')
@section('content1')
<div class="">
  <a href="{{ url('back/shopitem/create') }}" class="btn btn-lg btn-primary">Create Item</a>
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Picture</th>
      <th>Title</th>
      <th>Item number</th>
      <th>Maket Price</th>
      <th>Sell Price</th>
      <th>Stock Quantity</th>
      <th>Created Time</th>
      <th>Updated Time</th>
      <th>Modify</th>
    </tr>
    @foreach ($shopitems as $shopitem)
    <tr>
      <td>
        {{ $shopitem->id }}
      </td>
      <td>
        <img src="../{{ $shopitem->img }}" alt="" class="height100" width="100%">
      </td>
      <td>
        <P>{{ $shopitem->title}}</P>
      </td>
      <td>
        <P>{{ $shopitem->goods_no}}</P>
      </td>
      <td>
        <P>{{ $shopitem->market_price}}</P>
      </td>
      <td>
        <P>{{ $shopitem->sell_price}}</P>
      </td>
      <td>
        <P>{{ $shopitem->stock_quantity}}</P>
      </td>
      <td>
          <P>{{ $shopitem->created_at}}</P>
      </td>
      <td>
          <P>{{ $shopitem->updated_at}}</P>
      </td>
      <td>
          <a href="{{ url('back/shopitem/'.$shopitem->id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('back/shopitem/'.$shopitem->id) }}" method="POST" style="display: inline;">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
