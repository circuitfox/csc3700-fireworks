<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductModelTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactory()
    {
        $product = factory(\App\Product::class)->create();
        $this->assertNotNull($product);
    }
}
