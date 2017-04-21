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

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'img_link' => $faker->imageUrl($width = 200, $height = 200, 'cats'),
        'catalog_page' => $faker->randomDigit,
        'brand' => $faker->company,
        'description' => $faker->word,
        'packing' => $faker->safeColorName,
        'remarks' => $faker->sentence,
        'piece_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 300),
        'case_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50),
    ]
});
