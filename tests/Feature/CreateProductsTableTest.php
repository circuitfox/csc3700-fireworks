<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class CreateproductsTableTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHasproductsTable()
    {
        $this->assertTrue(Schema::hasTable('products'));
    }

    public function testHasIdColumn()
    {
        $this->assertTrue(Schema::hasColumn('products', 'id'));
    }

    public function testHasCatologPageColumn()
    {
        $this->assertTrue(Schema::hasColumn('products', 'catalog_page'));
    }

    public function testHasBrandColumn()
    {
        $this->assertTrue(Schema::hasColumn('products', 'brand'));
    }

    public function testHasDescriptionColumn()
    {
        $this->assertTrue(Schema::hasColumn('products', 'description'));
    }

    public function testHasPackingColumn()
    {
        $this->assertTrue(Schema::hasColumn('products', 'packing'));
    }

    public function testHasRemarksColumn()
    {
        $this->assertTrue(Schema::hasColumn('products', 'remarks'));
    }

    public function testHasPiecePriceColumn()
    {
        $this->assertTrue(Schema::hasColumn('products', 'piece_price'));
    }

    public function testHasCasePriceColumn()
    {
        $this->assertTrue(Schema::hasColumn('products', 'case_price'));
    }
}
