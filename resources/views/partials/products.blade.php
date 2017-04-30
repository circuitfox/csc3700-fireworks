<div class="panel-group" id="products" role="tablist">
  @foreach ($products as $product)
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        @if ($dashboard)
          <div class="row">
            <a class="accordion collapsed col-md-8" role="button" data-toggle="collapse"
               data-parent="#products" href="#product{{ $product->id }}">
              @include("partials/product/header", ["product" => $product])
            </a>
            <div class="btn-toolbar col-md-4">
              <form name="edit-product{{ $product->id }}" action="/products/{{ $product->id }}/edit"
                    method="get">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary h3">Edit</button>
              </form>
              <button type="button" class="btn btn-primary h3" data-toggle="modal"
                      data-target="#product-delete-modal" data-id="{{ $product->id }}">Delete</button>
            </div>
          </div>
        @else
          <a class="accordion collapsed" role="button" data-toggle="collapse"
             data-parent="#products" href="#product{{ $product->id }}">
            @include("partials/product/header", ["product" => $product])
          </a>
        @endif
      </div>
      <div id="product{{ $product->id }}" class="panel-collapse collapse" role="tabpanel">
        <div class="panel-body">
          @include("partials/product/body", ["product" => $product])
        </div>
      </div>
    </div>
  @endforeach
  <div class="container">
    <div class="col-md-9 text-center">
      {{ $products->links() }}
    </div>
  </div>
  @if ($dashboard)
    @include("partials/product/delete-modal")
  @endif
</div>
