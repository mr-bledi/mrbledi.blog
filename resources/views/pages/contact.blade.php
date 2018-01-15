@extends('main')
@section('title', 'Contact')

@section('content')
<div class="container">
  <div class="row">
    <h1>Contact Me</h1>
    <hr>
    <form action="{{ url('contact') }}" method="POST">
      <div class="form-group">
        <label name="email">Email: </label>
        <input id="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label name="subject">Subject: </label>
        <input id="subject" name="subject" class="form-control">
      </div>
      <div class="form-group">
        <label name="message">Message: </label>
        <textarea id="message" name="message" class="form-control">Type your message here... </textarea>
      </div>

      <input type="submit" class="btn btn-success" value="Send Message">
    </form>
  </div>
</div> <!--- end of container -->
@endsection