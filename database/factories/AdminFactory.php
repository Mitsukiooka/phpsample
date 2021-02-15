<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    $date = \Carbon\Carbon::now();
    return [
        'admin_code' => $faker->randomNumber(),
        'name' => $faker->name,
        'password' => $faker->password,
        'role' => $faker->randomDigitNotNull//
    ];
});
