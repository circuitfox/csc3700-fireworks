@extends("layouts/app")
@section("content")
<div class="col-sm-2">
  <a class="btn btn-primary pull-right" role="button" href="/products">Go Back</a>
</div>
<div class="container col-md-8">
  <div class="panel">
    <div class="panel-heading panel-default">
      @include("partials/product/header", ["product" => $product])
    </div>
    <div class="panel-body">
      @include("partials/product/body", ["product" => $product])
    </div>
  </div>
</div>
@endsection
