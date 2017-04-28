@extends("layouts/app")
@section("content")
<div class="container col-md-1">
  <a class="btn btn-primary pull-right" href="/home" type="button">Go Back</a>
</div>
<div class="container col-md-6 col-md-offset-2">
  <div class="panel">
    <div class="panel-heading panel-default">
      @include("partials/product_insert/header")
    </div>
    <div class="panel-body">
      @include("partials/product_insert/body")
    </div>
  </div>
</div>
@endsection
