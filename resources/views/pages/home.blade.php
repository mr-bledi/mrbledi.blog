@extends('main')
@section('title', 'Homepage')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="jumbotron">
      <h1>Welcome to my blog</h1>
      <p class=lead> Thank you for visiting. This is my test website built with Laravel, step by step.The whole idea here is to create a content managment system which posts, updates, uploads ecc</p>
      <p><a class="btn btn-primary btn-lg">Popular Post</a></p>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8"> <!-- Container md8 -->
    @foreach ($posts as $post)
    <div class="post">

      <h3>{{ $post->title }}</h3>
      <img src="{{asset('images/'.$post->image)}}" alt="" width="35%" style="margin-bottom:11px">
      <p>{{ substr(strip_tags($post->body), 0, 280)}} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
      <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary" >Read More</a>
    </div>
    <hr>
    @endforeach

  </div>  <!-- End of container md8 -->
  <div class="col-md-3 col-md-offset-1">  <!-- Container md3 -->
    <h2>Sidebar</h2>
    <div class="well">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>  <!-- End of ontainer md3 -->
</div>
@endsection
