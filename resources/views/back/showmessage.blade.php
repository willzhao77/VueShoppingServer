@extends('adminframe')
@section('content')
<div class="">
  <a href="{{ url('back/message/create') }}" class="btn btn-lg btn-primary">Create Message</a>
  <table border = "1px">
    <tr>
      <th>ID</th>
      <th>Message Title</th>
      <th>Content</th>
      <th>sender</th>
      <th>Created Time</th>
      <th>Updated Time</th>
      <th>Modify</th>
    </tr>
    @foreach ($messages as $message)
    <tr>
      <td>
        {{ $message->id }}
      </td>
      <td>
        {{ $message->title }}
      </td>
      <td>
        <P>{{ $message->content}}</P>
      </td>
      <td>
        <P>{{ $message->sender}}</P>
      </td>
      <td>
          <P>{{ $message->created_at}}</P>
      </td>
      <td>
          <P>{{ $message->updated_at}}</P>
      </td>
      <td>
          <a href="{{ url('back/message/'.$message->id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('back/message/'.$message->id) }}" method="POST" style="display: inline;">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
    </tr>
    @endforeach
  </table>

  {{ $messages->links() }}
</div>
@endsection
