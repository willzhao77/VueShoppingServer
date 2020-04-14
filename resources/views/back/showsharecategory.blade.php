@extends('adminframe')
@section('content')
<div class="">
  <a href="{{ url('back/sharecategory/create') }}" class="btn btn-lg btn-primary">Create Category</a>
  <table border = "1px">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Created Time</th>
      <th>Updated Time</th>
      <th>Modify</th>
    </tr>
    @foreach ($sharecategories as $category)
    <tr>
      <td>
        {{ $category->id }}
      </td>
      <td>
        {{ $category->title }}
      </td>
      <td>
          <P>{{ $category->created_at}}</P>
      </td>
      <td>
          <P>{{ $category->updated_at}}</P>
      </td>
      <td>
          <a href="{{ url('back/sharecategory/'.$category->id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('back/sharecategory/'.$category->id) }}" method="POST" style="display: inline;">
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
