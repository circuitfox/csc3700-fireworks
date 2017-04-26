<div class="container">
  <form class="form-horizontal" method="POST" action="/products" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="id" class="col-md-2 control-label">Product ID#:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="id" name="id" required>
      </div>
    </div>
    <div class="form-group">
      <label for="img_link" class="col-md-2 control-label">Upload Preview Image:</label>
      <div class="col-md-6">
        <input type="file" id="img_link" name="img_link" required>
      </div>
    </div>
    <div class="form-group">
      <label for="catalog_page" class="col-md-2 control-label">Catalog Page:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="catalog_page" name="catalog_page">
      </div>
    </div>
    <div class="form-group">
      <label for="brand" class="col-md-2 control-label">Brand Name:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="brand" name="brand" required>
      </div>
    </div>
    <div class="form-group">
      <label for="description" class="col-md-2 control-label">Product Name:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="description" name="description" required>
      </div>
    </div>
    <div class="form-group">
      <label for="packing" class="col-md-2 control-label">Packing:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="packing" name="packing" required>
      </div>
    </div>
    <div class="form-group">
      <label for="remarks" class="col-md-2 control-label">Remarks:</label>
      <div class="col-md-6">
        <input type="text" class="form-control" id="remarks" name="remarks">
      </div>
    </div>
    <div class="form-group">
      <label for="piece_price" class="col-md-2 control-label">Price Per Piece:</label>
      <div class="col-md-6 input-group">
        <div class="input-group-addon">$</div>
        <input type="text" class="form-control" id="piece_price" name="piece_price" required>
      </div>
    </div>
    <div class="form-group">
      <label for="case_price" class="col-md-2 control-label">Price Per Case:</label>
      <div class="col-md-6 input-group">
        <div class="input-group-addon">$</div>
        <input type="text" class="form-control" id="case_price" name="case_price" required>
      </div>
    </div>
    <div class="col-sm-2 col-sm-offset-8">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
