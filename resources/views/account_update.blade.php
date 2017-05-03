@extends("layouts.app")
@section("content")
<div class="container">
  @foreach($errors->all() as $error)
    {{print($error . "\n")}}
  @endforeach
  <div class="panel panel-default col-md-8 col-md-offset-2">
    <div class="panel-heading">
      <h4>Edit Account Settings</h4>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="/users/{{ $user->id}}" method="post">
        {{ csrf_field() }}
        {{ method_field("put") }}
        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Name:</label>
          @if (!Auth::user()->is_admin)
            <div class="col-md-6">
              <input type="text" class="form-control" id="name" name="name" required value="{{ $user->name }}">
            </div>
          @else
            <input type="hidden" class="form-control" id="name" name="name" required value="{{ $user->name }}">
            <div class="col-md-6" data-toggle="tooltip" title="Admin account name can't be changed">
              <input type="text" class="form-control" id="_name" name="_name" disabled value="{{ $user->name }}">
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="email" class="col-md-2 control-label">Email Address:</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="email" name="email" required value="{{ $user->email }}">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-md-2 control-label">Password</label>
          <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password">
          </div>
        </div>
        <div class="form-group">
          <label for="password_confirmation" class="col-md-2 control-label">Confirm Password:</label>
          <div class="col-md-6">
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-2">
            <a class="btn btn-default" href="{{ url()->previous() }}">Cancel</a>
          </div>
          <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
