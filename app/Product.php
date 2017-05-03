<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $fillable = ['id', 'catalog_page', 'brand', 'description',
                           'packing', 'remarks', 'piece_price', 'case_price'];

    public function orders() {
        return $this->hasMany("\App\ProductOrder");
    }
}
