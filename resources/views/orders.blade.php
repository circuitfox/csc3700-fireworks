@extends("layouts/app")
@section("content")
<div class="container col-md-8 col-md-offset-2">
    @include("partials.orders", ["orders" => $orders, "dashboard" => false])
</div>
@endsection
