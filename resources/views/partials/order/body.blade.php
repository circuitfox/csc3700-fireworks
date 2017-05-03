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
          @if ($productOrder->product->trashed())
            <i>{{ $productOrder->product->description }}</i>
          @else
            <b><a href="/products/{{ $productOrder->product->id }}">
              {{ $productOrder->product->description }}
            </a></b>
          @endif
        </td>
        <td>
          ${{ number_format($productOrder->quantity * $productOrder->product->piece_price, 2) }}
        </td>
      </tr>
    @endforeach
      <tfoot>
        <tr>
          <td><b>Total Price:</b></td>
          <td></td>
          <td>
            ${{ number_format($order->productOrders->reduce(function ($acc, $po) {
                    return $acc + ($po->product->piece_price * $po->quantity);
                }), 2)
             }}
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
