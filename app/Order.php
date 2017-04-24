<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo("\App\User");
    }

    public function productOrders() {
        return $this->hasMany("\App\ProductOrder");
    }
}
