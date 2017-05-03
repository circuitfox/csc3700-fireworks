@extends('layouts/app')
@section('content')
<div class="container">
  <div class="jumbotron">
    <h1>Welcome to the website!</h1>
    <p>Please log in or register</p>
    <div class="row">
      <a href="{{ route('login) }}" class="btn btn-primary col-md-2 col-md-offset-4">Login</a>
      <a href="{{ route('register) }}" class="btn btn-primary col-md-2 col-md-offset-1">Register</a>
    </div>
  </div>
</div>
@endsection
