<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class CreateProductOrdersTest extends TestCase
{
    use DatabaseMigrations;

    public function testHasProductOrdersTable()
    {
        $this->assertTrue(Schema::hasTable("product_orders"));
    }

    public function testHasIdColumn()
    {
        $this->assertTrue(Schema::hasColumn("product_orders", "id"));
    }

    public function testHasOrderOrderIdColumn()
    {
        $this->assertTrue(Schema::hasColumn("product_orders", "order_id"));
    }

    public function testHasProductProductIdColumn()
    {
        $this->assertTrue(Schema::hasColumn("product_orders", "product_id"));
    }

    public function testHastQuantityColumn()
    {
        $this->assertTrue(Schema::hasColumn("product_orders", "quantity"));
    }
}
