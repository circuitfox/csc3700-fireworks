<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'is_admin' => false,
    ];
});

$factory->state(App\User::class, 'admin', function (Faker\Generator $faker) {
    return [
        'is_admin' => true,
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
    ];
});

$factory->state(App\Order::class, 'with_user', function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create();
        }
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->randomNumber(),
        'img_link' => $faker->imageUrl($width = 200, $height = 200, 'cats'),
        'catalog_page' => $faker->randomNumber(3),
        'brand' => $faker->company,
        'description' => $faker->word,
        'packing' => $faker->safeColorName,
        'remarks' => $faker->sentence,
        'piece_price' => $faker->randomFloat(2, 0, 999999.99),
        'case_price' => $faker->randomFloat(2, 0, 999999.99),
    ];
});

$factory->define(App\ProductOrder::class, function (Faker\Generator $faker) {
    return [
        'order_id' => 1,
        'product_id' => 1,
        'quantity' => $faker->randomNumber(2),
    ];
});

$factory->state(App\ProductOrder::class, 'with_product', function (Faker\Generator $faker) {
    return [
        'product_id' => function() {
            return factory(App\Product::class)->create()->id;
        },
    ];
});

$factory->state(App\ProductOrder::class, 'with_order', function (Faker\Generator $faker) {
    return [
        'order_id' => function() {
            return factory(App\Order::class)->states('with_user')->create()->id;
        }
    ];
});
