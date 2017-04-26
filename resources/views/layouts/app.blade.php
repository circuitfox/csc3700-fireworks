<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="fireworks shop admin dashboard page">
    <meta name="author" content="Carl, Chris and Jameson">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Fireworks Shop Admin Page</title>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">Fireworks Shop</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            @if(Auth::guest())
            @elseif(Auth::user()->is_admin == 1)
              <li><a href="/products">Products</a></li>
              <li><a href="/orders">Orders</a></li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::guest())
              <li><a href="/login">Login</a></li>
              <li><a href="/register">Register</a></li>
            @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }}
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="/home" class="glyphicon glyphicon-home">Dashboard</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="glyphicon glyphicon-log-out">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
              @endif
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
