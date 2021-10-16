<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Constants\RoleConstants;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'check_percent' => $this->faker->numberBetween(0, 1),
        'login' => $this->faker->unique()->userName(),
        'role' => $this->faker->randomElement(RoleConstants::list()),
    ];
});
