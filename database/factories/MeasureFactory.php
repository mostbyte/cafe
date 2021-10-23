<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Constants\MeasureConstants;
use App\Measure;
use Faker\Generator as Faker;

$factory->define(Measure::class, function (Faker $faker) {
    return [
        'name' => $this->faker->randomElement(MeasureConstants::list()),
    ];
});
