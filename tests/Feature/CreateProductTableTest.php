<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class CreateProductTableTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHasProductTable()
    {
        $this->assertTrue(Schema::hasTable('product'));
    }

    public function testHasIdColumn()
    {
        $this->assertTrue(Schema::hasColumn('product', 'id'));
    }

    public function testHasCatologPageColumn()
    {
        $this->assertTrue(Schema::hasColumn('product', 'catalog_page'));
    }

    public function testHasBrandColumn()
    {
        $this->assertTrue(Schema::hasColumn('product', 'brand'));
    }

    public function testHasDescriptionColumn()
    {
        $this->assertTrue(Schema::hasColumn('product', 'description'));
    }

    public function testHasPackingColumn()
    {
        $this->assertTrue(Schema::hasColumn('product', 'packing'));
    }

    public function testHasRemarksColumn()
    {
        $this->assertTrue(Schema::hasColumn('product', 'remarks'));
    }

    public function testHasPiecePriceColumn()
    {
        $this->assertTrue(Schema::hasColumn('product', 'piece_price'));
    }

    public function testHasCasePriceColumn()
    {
        $this->assertTrue(Schema::hasColumn('product', 'case_price'));
    }
}
