<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Product::class, function (Faker $faker) {
    $measure = DB::table('measures')->inRandomOrder()->first();
    return [
        'name' => $this->faker->word(),
        'measure_id' => $measure->id,
        'price' => $this->faker->numberBetween(10000, 1000000),
        'department_id' => $this->faker->numberBetween(1, 5),
    ];
});
