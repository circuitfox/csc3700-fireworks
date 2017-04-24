@extends("layouts/app")
@section("content")
</div>
<div class="container col-md-8 col-md-offset-2">
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
