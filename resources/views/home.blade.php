@extends('layouts.app')
@section('content')
@if(Auth::user()->is_admin == 1)
  <div class="container">
    <ul class="nav nav-tabs col-md-offset-1 col-md-9">
      <li class="active"><a href="#tab1" data-toggle="tab">Products</a></li>
      <li><a href="#tab2" data-toggle="tab">Orders</a></li>
    </ul>
    <div class="tab-content col-md-offset-1 col-md-9" id="TabContents">
      <div class="tab-pane fade active in" id="tab1">
        <a class="btn btn-primary margin-10" type="button" href="/products/create">Add Product</a>
        @include("partials/products", ["products" => App\Product::paginate(10), "dashboard" => true])
      </div>
      <div class="tab-pane fade" id="tab2">
        @include("partials/orders", ["orders" => App\Order::all()])
      </div>
    </div>
  </div>
@else
  <div class="container">
    <div class="col-md-offset-1 col-md-9">
      @include("partials.order_insert");
    </div>
  </div>
@endif
@endsection
