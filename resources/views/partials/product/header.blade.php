<h3>
  {{ $product->description }}
  <?php if ($_SERVER['PHP_SELF'] == "/index.php/products"){
    echo '<a class="btn btn-primary pull-right" role="button" href="#">Update</a>';
  }?>
</h3>
