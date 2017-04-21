<div class="panel-group" id="products" role="tablist">
  @foreach ($products as $product)
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        <a class="accordion collapsed" role="button" data-toggle="collapse" data-parent="#products" href="#products{{ $product->id }}">
          @include("partials/product/header", ["product" => $product])
        </a>
      </div>
      <div id="order{{ $order->id }}" class="panel-collapse collapse" role="tabpanel">
        <div class="panel-body">
          @include("partials/product/body", ["product" => $product])
        </div>
      </div>
    </div>
  @endforeach
</div>
