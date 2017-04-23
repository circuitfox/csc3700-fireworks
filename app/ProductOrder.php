<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $fillable = ["quantity", "order_id", "product_id"];

    public function order() {
        return $this->belongsTo("\App\Order");
    }

    public function product() {
        return $this->belongsTo("\App\Product");
    }
}
