@extends("layouts/app")
@section("content")
<div class="container col-md-8 col-md-offset-2">
    <div class="panel">
        <div class="panel-heading panel-default">
            @include("partials.order.header", ["order" => $order])
        </div>
        <div class="panel-body">
            @include("partials.order.body", ["order" => $order])
        </div>
    </div>
</div>
@endsection
