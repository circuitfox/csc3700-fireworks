@extends("layouts.app")
@section("content")
<div class="container">
  <div class="panel panel-default col-md-8 col-md-offset-2">
    <div class="panel-heading">
      <h4>Account Settings</h4>
    </div>
    <div class="panel-body">
      <p><strong>Name:</strong> {{ $user->name }}</p>
      <p><strong>Email Address:</strong> {{ $user->email }}</p>
      <div class="col-md-1">
        <a class="btn btn-primary" href="/users/{{ $user->id }}/edit">Edit</a>
      </div>
      <div class="col-md-1">
        <form action="/users/{{ $user->id }}" method="post">
          {{ csrf_field() }}
          {{ method_field("delete") }}
          @if (Auth::user()->is_admin)
            <div data-toggle="tooltip" title="Admin account cannot be deleted">
              <button type="submit" class="btn btn-danger" disabled>Delete</button>
            </div>
          @else
            <button type="submit" class="btn btn-danger">Delete</button>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
