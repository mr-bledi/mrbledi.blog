@extends('main')

@section('title', 'Delete comment?')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3>Are you Sure? </h3>
      <p> <strong>Name</strong> {{ $comment->name }} </p>
      <p> <strong>Email</strong> {{ $comment->email }} </p>
      <p> <strong>Comment</strong> {{ $comment->comment }} </p>
      {{Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])}}
      {!! Form::submit('Yes', ['class' => 'btn btn-danger btn-block form-spacing-top']) !!}
    </div>
  </div>
@endsection
