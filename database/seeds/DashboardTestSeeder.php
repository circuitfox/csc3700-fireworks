<?php

use Illuminate\Database\Seeder;

class DashboardTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(\App\User::class)->create();
        $orders = factory(\App\Order::class, 5)->create()->each(function ($o) use ($user) {
            $o->user()->associate($user);
            $o->save();
        });
        foreach ($orders as $order) {
            factory(\App\ProductOrder::class, 5)
            ->states("with_product")
            ->create()
            ->each(function ($po) use ($order) {
                $po->order()->associate($order);
                $po->save();
            });
        }
    }
}
