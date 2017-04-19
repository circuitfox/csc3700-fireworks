<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = ['id', 'catalog_page', 'brand', 'description', 'packing', 'remarks', 'piece_price', 'case_price'];
}
