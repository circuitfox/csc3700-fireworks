<?php

namespace Tests\Feature;

use Tests\LayoutTests;
use Tests\TestCase;
use Tests\TestHelpers;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{
    use DatabaseMigrations;
    use LayoutTests;
    use TestHelpers;

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
        $user = factory(\App\User::class)->states('admin')->create();
        $this->actingAs($user)->get($this->getRoute())
            ->assertSee("nav-tabs")
            ->assertSee("#tab1")
            ->assertSee("#tab2")
            ->assertSee("tab-content")
            ->assertSee("tab-pane");
    }

    public function testHasInsertButton()
    {
        $user = factory(\App\User::class)->states('admin')->create();
        $this->actingAs($user)->get($this->getRoute())
            ->assertSee("/products/create")
            ->assertSee("Add Product");
    }

    public function testHasProducts()
    {
        $user = factory(\App\User::class)->states('admin')->create();
        $products = factory(\App\Product::class, 10)->create();
        $page = $this->actingAs($user)->get($this->getRoute());
        foreach ($products as $product) {
            $page->assertSee("product" . $product->id)
                ->assertSee($this->h($product->description))
                ->assertSee("edit-product" . $product->id)
                ->assertSee("/products/" . $product->id . "/edit")
                ->assertSee($this->h($product->brand));
        }
        $page->assertSee("product-delete-modal");
    }

    public function testHasOrders()
    {
        $user = factory(\App\User::class)->states('admin')->create();
        $orders = factory(\App\Order::class, 10)->create()->each(function($o) use ($user) {
            $o->user()->associate($user);
            $o->save();
        });
        foreach ($orders as $order) {
            $productOrder = factory(\App\ProductOrder::class)
                ->states("with_product")
                ->create();
            $productOrder->order()->associate($order);
            $productOrder->save();
        }
        $page = $this->actingAs($user)->get($this->getRoute());
        foreach ($orders as $order) {
            $page->assertSee("#order" . $order->id)
                ->assertSee("Order " . $order->id)
                ->assertSee("for " . $this->h($order->user->name))
                ->assertSee("for " . $this->h($user->name))
                ->assertSee("<table class=\"table\">")
                ->assertSee("Quantity")
                ->assertSee("Product")
                ->assertSee("Price")
                ->assertSee("<td>" . $order->productOrders[0]->quantity . "</td>")
                ->assertSee($order->productOrders[0]->product->description)
                ->assertSee("/products/" . $order->productOrders[0]->product->id)
                ->assertSee("$" . number_format($order->productOrders[0]->product->piece_price * 
                                                $order->productOrders[0]->quantity, 2))
                ->assertSee("Total Price:");
        }
    }
}
