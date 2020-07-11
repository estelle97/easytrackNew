<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Snack;
use App\User;
use Faker\Generator as Faker;

$factory->define(Snack::class, function (Faker $faker) {
    $name = $faker->unique()->company;
    $user_id = $faker->unique()->randomElement(['1','2','3','4','5']);
    $slug = preg_replace('~[^\pL\d]+~u', '-', preg_replace('~[^-\w]+~', '', strtolower($name)));
    return [
        'name' => $name,
        'slug' => $slug,
        'email' => $faker->companyEmail,
        'tel1' => $faker->unique()->phoneNumber,
        'tel2' => $faker->unique()->phoneNumber,
        'town' => $faker->state,
        'street' => $faker->city,
        'user_id' => $user_id,
    ];
});
