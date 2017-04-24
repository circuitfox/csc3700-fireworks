<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductOrderModelTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactory()
    {
        $productOrder = factory(\App\ProductOrder::class)
            ->states("with_product", "with_order")
            ->create();
        $this->assertNotNull($productOrder);
        $this->assertNotNull($productOrder->order);
        $this->assertNotNull($productOrder->order->user);
        $this->assertNotNull($productOrder->product);
    }

}
