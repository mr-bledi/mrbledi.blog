@extends('main')

@section('title', 'Blog')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Blog</h1>
      <hr>
    </div>
  </div>

  @foreach ($posts as $post)

  <div class="row">
    <div class="col-md-8">
      <h2>{{$post->title}}</h2>

      <img src="{{asset('images/'.$post->image)}}" alt="" width="35%">

      <h5>Published: {{ date('M j, Y', strtotime($post->created_at))}}</h5>

      <p>{{substr(strip_tags($post->body), 0, 300)}}{{ strlen(strip_tags($post->body)) >250 ? '...' : "" }}</p>

      <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read Mode</a>
      <hr>
    </div>
  </div>
  @endforeach

  <div class="row">
    <div class="col-md-12">
      <div class="text-center">
        {!! $posts->links() !!}
      </div>
    </div>
  </div>

@endsection
