@extends("layouts/app")
@section("content")
<div class="container col-md-8 col-md-offset-2">
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
