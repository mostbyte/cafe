<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Table;
use Faker\Generator as Faker;

$factory->define(Table::class, function (Faker $faker) {
    return [
        'name' => $this->faker->unique()->numberBetween(1, 100),
        'price' => $this->faker->numberBetween(100000, 500000),
    ];
});
