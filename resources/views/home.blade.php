@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @if(Auth::user()->is_admin == 1)
                  <div class="panel-body">
                      This is the admin dashboard!
                  </div>
                @else
                  <div class="panel-body">
                      This is the customer dashboard!
                  </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
