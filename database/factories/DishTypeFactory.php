<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DishType;
use Faker\Generator as Faker;

$factory->define(DishType::class, function (Faker $faker) {
    return [
        'name' => $this->faker->unique()->word(),
    ];
});
