<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id');
            $table->primary('id');
            $table->string('img_link');
            $table->integer('catalog_page')->nullable();
            $table->string('brand');
            $table->string('description');
            $table->string('packing');
            $table->string('remarks')->nullable();
            $table->decimal('piece_price');
            $table->decimal('case_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
