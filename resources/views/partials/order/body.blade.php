<div class="container">
  <div class="col-sm-8">
    <table class="table">
      <tr>
        <th>Quantity</th>
        <th>Product</th>
        <th>Price</th>
      </tr>
    @foreach ($order->productOrders as $productOrder)
      <tr>
        <td>{{ $productOrder->quantity }}</td>
        <td>
          <b><a href="/products/{{ $productOrder->product->id }}">
            {{ $productOrder->product->description }}
          </a></b>
        </td>
        <td>
          ${{ $productOrder->quantity * $productOrder->product->piece_price }}
        </td>
      </tr>
    @endforeach
      <tfoot>
        <tr>
          <td><b>Total Price:</b></td>
          <td></td>
          <td>
            ${{ $order->productOrders->reduce(function ($acc, $po) {
                    return $acc + $po->product->piece_price;
                })
             }}
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
