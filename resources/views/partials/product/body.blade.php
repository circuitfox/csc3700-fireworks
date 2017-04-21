<div class="container">
  <div class="col-sm-4">
    <!-- product img -->
    <img src="{{ $product->img_link }}" alt="{{ $product->description }}" height="200" width="200">
  </div>
  <div class="col-sm-4">
    <!-- product info -->
    <h4>Description:</h4><br>
    <p>{{ $product->description }}</p>
    <h4>Brand:</h4><br>
    <p>{{ $product->brand }}</p>
    <h4>Catalog Page:</h4><br>
    <p>{{ $product->catalog_page }}</p>
    <h4>Packing:</h4><br>
    <p>{{ $product->packing }}</p>
    <h4>Remarks:</h4><br>
    <p>{{ $product->remarks }}</p>
    <h4>Price Per Case:</h4><br>
    <p>{{ $product->case_price }}</p>
    <h4>Price Per Piece:</h4><br>
    <p>{{ $product->piece_price }}</p>
  </div>
</div>
