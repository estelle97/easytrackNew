<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Snack;
use Faker\Generator as Faker;

$factory->define(Snack::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'tel1' => $faker->unique()->phoneNumber,
        'tel2' => $faker->unique()->phoneNumber,
        'town' => $faker->state,
        'street' => $faker->city
    ];
});
