@extends('home')
@section('content1')
<div class="">
  <a href="{{ url('back/slideshow/create') }}" class="btn btn-lg btn-primary">New Slide</a>
  <table border = "1px">
    <tr>
      <th>ID</th>
      <th>Picture</th>
      <th>URL</th>
      <th>Created Time</th>
      <th>Updated Time</th>
      <th>Modify</th>
    </tr>
    @foreach ($slides as $slide)
    <tr>
      <td>
        {{ $slide->id }}
      </td>
      <td>
        <img src="../{{ $slide->img }}" alt="" class="height100" width="180">
      </td>
      <td>
        <P>{{ $slide->url}}</P>
      </td>
      <td>
          <P>{{ $slide->created_at}}</P>
      </td>
      <td>
          <P>{{ $slide->updated_at}}</P>
      </td>
      <td>
          <a href="{{ url('back/slideshow/'.$slide->id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('back/slideshow/'.$slide->id) }}" method="POST" style="display: inline;">
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
