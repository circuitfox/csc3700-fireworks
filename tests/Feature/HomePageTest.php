<?php

namespace Tests\Feature;

use Tests\LayoutTests;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{
    use DatabaseMigrations;
    use LayoutTests;

    protected function getRoute() {
       return "/home";
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHasTabs()
    {
        $this->get($this->getRoute())
            ->assertSee("nav-tabs")
            ->assertSee("#tab1")
            ->assertSee("#tab2")
            ->assertSee("tab-content")
            ->assertSee("tab-pane");
    }

    public function testHasInsertButton()
    {
        $this->get($this->getRoute())
            ->assertSee("/products/create")
            ->assertSee("Add Product");
    }

    public function testHasProducts()
    {
        $products = factory(\App\Product::class, 10)->state('admin')->create();
        $page = $this->get($this->getRoute());
        foreach ($products as $product) {
            $page->assertSee("product" . $product->id)
                ->assertSee(htmlspecialchars($product->description, ENT_QUOTES))
                ->assertSee("edit-product" . $product->id)
                ->assertSee("/products/" . $product->id . "/edit")
                ->assertSee($product->brand);
        }
        $page->assertSee("product-delete-modal");
    }

    public function testHasOrders()
    {
        $user = factory(\App\User::class)->state('admin')->create();
        $orders = factory(\App\Order::class, 10)->create()->each(function($o) use ($user) {
            $o->user()->associate($user);
            $o->save();
        });
        $page = $this->get($this->getRoute());
        foreach ($orders as $order) {
            $page->assertSee("#order" . $order->id)
                ->assertSee("Order " . $order->id)
                ->assertSee("for " . htmlspecialchars($order->user->name, ENT_QUOTES))
                ->assertSee("for " . htmlspecialchars($user->name, ENT_QUOTES));
        }
    }
}
