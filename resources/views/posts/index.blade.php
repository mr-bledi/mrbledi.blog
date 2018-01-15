@extends('main')

@section('title', 'All Posts')

@section('content')
  <div class="row">
    <div class="col-md-10">
      <h1>All posts</h1>
    </div>
    <div class="col-md-2">
      <a href="{{ route('posts.create') }}" class="btn btn-primary btn-h1-spacing">Create New Posts</a>
      <hr>
    </div>

  </div> <!-- End of the row -->
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
                <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-default">View</a> &nbsp;<a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-default">Edit</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {!! $posts->links(); !!}
      </div>
    </div>
  </div>

@endsection