@extends("layouts/app")
@section("content")
<div class="container col-md-8 col-md-offset-2">
  @include("partials/products", ["products" => $products, "dashboard" => false])
</div>
@endsection
