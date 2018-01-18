@extends('main')
@php
  $titleTag = htmlspecialchars($post->title);
@endphp
@section('title', "$titleTag" )

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <img src="{{ asset('images/' . $post->image) }}">

      <h1>{{ $post->title }}</h1>
      <p> Category: {{ $post->category->name }}</p>
      <p>
        Tags:
        @foreach ($post->tags as $tag)
          <span class="label label-default">{{ $tag->name }}</span>
        @endforeach
      </p>
      <br>
      <p>{!! $post->body !!}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <hr>
      <h4>
        <span class="glyphicon glyphicon-comment">
          {{ $post->comments()->count() }} Comment(s)
        </span>
      </h4>
      <br>
      @foreach ($post->comments as $comment)
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?d=retro" }}" class="media-object" alt="64x64" data-holder-rendered="true">
            </a>
          </div>
          <div class="media-body">
            <h4 class="media-heading">{{ $comment->name }}</h4>
            <div class="comment-created"> {{ date('F nS, Y - G:i', strtotime($comment->created_at))}} </div>
            {{ $comment->comment }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="row">
    <div class="comment-form col-md-8 col-md-offset-2">
      <hr>
      {{Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST'])}}
        <div class="row">
          <div class="col-md-4">
            {{Form::label('name', "Name:")}}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
          </div>
          <div class="col-md-4">
            {{Form::label('email', "Email:")}}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
          </div>

          <div class="col-md-12">
            {{Form::label('comment', "Comment:")}}
            {{Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '6'])}}
            {{Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;'])}}
          </div>
        </div>
      {{Form::close()}}
    </div>
  </div>

@endsection
