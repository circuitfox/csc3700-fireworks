<div class="container">
  <div class="col-sm-4">
    <!-- product img -->
    <img src="{{ $product->img_link }}" alt="{{ $product->description }}" height="200" width="200">
  </div>
  <div class="col-sm-4">
    <!-- product info -->
    <h5><b><u>Description:</u></b></h5>
    <p>{{ $product->description }}</p>
    <h5><b><u>Brand:</u></b></h5>
    <p>{{ $product->brand }}</p>
    <h5><b><u>Catalog Page:</u></b></h5>
    <p>{{ $product->catalog_page }}</p>
    <h5><b><u>Packing:</u></b></h5>
    <p>{{ $product->packing }}</p>
    <h5><b><u>Remarks:</u></b></h5>
    <p>{{ $product->remarks }}</p>
    <h5><b><u>Price Per Case:</u></b></h5>
    <p>{{ $product->case_price }}</p>
    <h5><b><u>Price Per Piece:</u></b></h5>
    <p>{{ $product->piece_price }}</p>
  </div>
</div>
