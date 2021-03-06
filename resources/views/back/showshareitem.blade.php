@extends('home')
@section('content1')
<div class="">
  <a href="{{ url('back/shareitem/create') }}" class="btn btn-lg btn-primary">Create Item</a>
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Picture</th>
      <th>Title</th>
      <th>category_id</th>
      <th>user_name</th>
      <th>Created Time</th>
      <th>Updated Time</th>
      <th>Modify</th>
    </tr>
    @foreach ($shareitems as $shareitem)
    <tr>
      <td>
        {{ $shareitem->id }}
      </td>
      <td>
        <img src="../{{ $shareitem->img }}" alt="" class="height100">
      </td>
      <td>
        <P>{{ $shareitem->title}}</P>
      </td>
      <td>
        <P>{{ $shareitem->itemCate->title}}</P>
      </td>
      <td>
        <P>{{ $shareitem->user_name}}</P>
      </td>
      <td>
          <P>{{ $shareitem->created_at}}</P>
      </td>
      <td>
          <P>{{ $shareitem->updated_at}}</P>
      </td>
      <td>
          <a href="{{ url('back/shareitem/'.$shareitem->id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('back/shareitem/'.$shareitem->id) }}" method="POST" style="display: inline;">
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
