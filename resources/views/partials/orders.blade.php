<div class="panel-group" id="orders" role="tablist">
    @foreach ($orders as $order)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <a class="accordion collapsed" role="button" data-toggle="collapse" data-parent="#orders"
                   href="#order{{ $order->id }}">
                    @include("partials.order.header", ["order" => $order])
                </a>
            </div>
            <div id="order{{ $order->id }}" class="panel-collapse collapse" role="tabpanel">
                <div class="panel-body">
                    @include("partials.order.body", ["order" => $order])
                </div>
            </div>
        </div>
    @endforeach
</div>
