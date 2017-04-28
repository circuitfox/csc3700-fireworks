<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\TestHelpers;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderControllerTests extends TestCase
{
    use DatabaseMigrations;
    use TestHelpers;

    public function testIndex()
    {
        $user = factory(\App\User::class)->create();
        $orders = factory(\App\Order::class, 5)->create()->each(function ($o) use ($user) {
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

        $resp = $this->get("/orders");
        foreach ($orders as $order) {
            $resp->assertSee("#order" . $order->id)
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

    public function testShow()
    {
        $user = factory(\App\User::class)->create();
        $order = factory(\App\Order::class)->create();
        $order->user()->associate($user);
        $order->save();
        $productOrder = factory(\App\ProductOrder::class)
            ->states("with_product")
            ->create();
        $productOrder->order()->associate($order);

        $this->get("/orders/" . $order->id)
            ->assertSee("Order " . $order->id)
            ->assertSee("for " . $this->h($order->user->name))
            ->assertSee("for " . $this->h($user->name))
            ->assertSee("<table class=\"table\">")
            ->assertSee("Quantity")
            ->assertSee("Product")
            ->assertSee("Price")
            ->assertSee("<td>" . $productOrder->quantity . "</td>")
            ->assertSee($productOrder->product->description)
            ->assertSee("/products/" . $productOrder->product->id)
            ->assertSee("$" . number_format($productOrder->product->piece_price *
                                            $productOrder->quantity, 2))
            ->assertSee("Total Price:");
    }
}
