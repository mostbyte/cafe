<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HalfStaff;
use Faker\Generator as Faker;

$factory->define(HalfStaff::class, function (Faker $faker) {
    return [
        'name' => $this->faker->word(),
        'stuff_type' => $this->faker->numberBetween(0, 4),
        'price' => $this->faker->numberBetween(10000, 1000000),
        'count' => $this->faker->numberBetween(1, 100),
        'department_id' => $this->faker->numberBetween(1, 5),
    ];
});
