@extends('adminframe')
@section('content')
<div class="">
  <a href="{{ url('back/newscomment/create') }}" class="btn btn-lg btn-primary">Create News</a>
  <table border = "1px">
    <tr>
      <th>ID</th>
      <th>news Title</th>
      <th>User name</th>
      <th>comment</th>
      <th>Created Time</th>
      <th>Updated Time</th>
      <th>Modify</th>
    </tr>
    @foreach ($comments as $comment)
    <tr>
      <td>
        {{ $comment->id }}
      </td>
      <td>
        {{ $comment->toNews->title }}
      </td>
      <td>
        <P>{{ $comment->name}}</P>
      </td>
      <td>
        <P>{{ $comment->content}}</P>
      </td>
      <td>
          <P>{{ $comment->created_at}}</P>
      </td>
      <td>
          <P>{{ $comment->updated_at}}</P>
      </td>
      <td>
          <a href="{{ url('back/newscomment/'.$comment->id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('back/newscomment/'.$comment->id) }}" method="POST" style="display: inline;">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
    </tr>
    @endforeach
  </table>

  {{ $comments->links() }}
</div>
@endsection
