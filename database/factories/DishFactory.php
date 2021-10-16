<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    return [
        'name' => $this->faker->unique()->word(),
        'count' => $this->faker->numberBetween(1, 20),
        'department_id' => $this->faker->numberBetween(1, 10),
    ];
});
