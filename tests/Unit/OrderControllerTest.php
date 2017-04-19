<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderControllerTests extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $user = factory(\App\User::class)->create();
        $orders = factory(\App\Order::class, 5)->create()->each(function ($o) use ($user) {
            $o->user()->associate($user);
            $o->save();
        });
        $resp = $this->get("/orders");
        foreach ($orders as $order) {
            $resp->assertSee("#order" . $order->id);
            $resp->assertSee("Order " . $order->id);
            $resp->assertSee("for " . htmlspecialchars($order->user->name));
            $resp->assertSee("for " . htmlspecialchars($user->name));

            // FIXME: Product order stuff
        }
    }

    public function testShow()
    {
        $user = factory(\App\User::class)->create();
        $order = factory(\App\Order::class)->create();
        $order->user()->associate($user);
        $order->save();

        $this->get("/orders/" . $order->id)
            ->assertSee("Order " . $order->id)
            ->assertSee("for " . htmlspecialchars($order->user->name))
            ->assertSee("for " . htmlspecialchars($user->name));
    }
}
