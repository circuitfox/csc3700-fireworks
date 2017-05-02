<div class="container">
  @foreach ($errors->all() as $error)
  {{ print($error . "\n") }}
  @endforeach
  <form class="form-horizontal" method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
    {{ method_field("PUT") }}
    {{ csrf_field() }}
    <div class="form-group">
      <label for="img_link" class="col-md-2 control-label">Upload Preview Image:</label>
      <div class="col-md-6">
        <input type="file" id="img_link" name="img_link" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <p>Current Image</p>
        <img src="{{ $product->img_link }}" alt="{{ $product->description }}" height="200" width="200">
      </div>
    </div>
    <div class="form-group">
      <label for="catalog_page" class="col-md-2 control-label">Catalog Page:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="catalog_page" name="catalog_page" value="{{ $product->catalog_page }}">
      </div>
    </div>
    <div class="form-group">
      <label for="brand" class="col-md-2 control-label">Brand Name:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="brand" name="brand" required value="{{ $product->brand }}">
      </div>
    </div>
    <div class="form-group">
      <label for="description" class="col-md-2 control-label">Product Name:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="description" name="description" required value="{{ $product->description }}">
      </div>
    </div>
    <div class="form-group">
      <label for="packing" class="col-md-2 control-label">Packing:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="packing" name="packing" required value="{{ $product->packing }}">
      </div>
    </div>
    <div class="form-group">
      <label for="remarks" class="col-md-2 control-label">Remarks:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $product->remarks }}">
      </div>
    </div>
    <div class="form-group">
      <label for="piece_price" class="col-md-2 control-label">Price Per Piece:</label>
      <div class="col-md-6 input-group">
        <div class="input-group-addon">$</div>
        <input type="text" class="form-control" id="piece_price" name="piece_price" required value="{{ $product->piece_price }}">
      </div>
    </div>
    <div class="form-group">
      <label for="case_price" class="col-md-2 control-label">Price Per Case:</label>
      <div class="col-md-6 input-group">
        <div class="input-group-addon">$</div>
        <input type="text" class="form-control" id="case_price" name="case_price" required value="{{ $product->case_price }}">
      </div>
    </div>
    <div class="col-sm-1 col-sm-offset-6">
      <a class="btn btn-default" href="/home" type="button">Go Back</a>
    </div>
    <div class="col-sm-1">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
