<div class="container">
  @if (session()->has("no-products"))
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      {{ session("no-products") }}
    </div>
  @endif
  <div class="panel">
    <div class="panel-heading">
      <h4>Order Products</h4>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ url('product_order/create') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="product" class="col-md-2">Product:</label>
          <select class="col-md-4" id="product" name="product" required>
            @foreach (App\Product::all() as $product)
              <option value="{{ $product->id }}">{{ $product->description }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="quantity" class="col-md-2">Quantity:</label>
          <input class="col-md-2" id="quantity" name="quantity" type="number" required>
        </div>
        <div class="form-group">
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Add Product</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-md-1">
          <form action="{{ url('orders') }}" method="post">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Submit Order</button>
          </form>
        </div>
      </div>
      @if (session()->has("products"))
        <table class="table">
          <tr>
            <th>Product</th>
            <th>Quantity</th>
          </tr>
          @foreach (session("products") as $productOrder)
            <tr>
              <td>{{ $productOrder->product->description }}</td>
              <td>{{ $productOrder->quantity }}</td>
            </tr>
          @endforeach
        </table>
      @endif
    </div>
  </div>
</div>
