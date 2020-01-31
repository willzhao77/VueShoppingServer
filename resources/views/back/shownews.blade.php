@extends('adminframe')
@section('content')
<div class="">
  <a href="{{ url('back/news/create') }}" class="btn btn-lg btn-primary">Create News</a>
  <table border = "1px">
    <tr>
      <th>ID</th>
      <th>Picture</th>
      <th>Title</th>
      <th>Created Time</th>
      <th>Updated Time</th>
      <th>Modify</th>
    </tr>
    @foreach ($news as $newsitem)
    <tr>
      <td>
        {{ $newsitem->id }}
      </td>
      <td>
        <img src="../../{{ $newsitem->img }}" alt="" class="height100" width="180">
      </td>
      <td>
        <P>{{ $newsitem->title}}</P>
      </td>
      <td>
          <P>{{ $newsitem->created_at}}</P>
      </td>
      <td>
          <P>{{ $newsitem->updated_at}}</P>
      </td>
      <td>
          <a href="{{ url('back/news/'.$newsitem->id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('back/news/'.$newsitem->id) }}" method="POST" style="display: inline;">
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
