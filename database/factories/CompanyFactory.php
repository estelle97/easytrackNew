<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    $name = $faker->unique()->company;
    $user_id = $faker->randomElement(['1','2','3','4','5']);
    $slug = preg_replace('~[^\pL\d]+~u', '-', preg_replace('~[^-\w]+~', '', strtolower($name)));
    return [
        'name' => $name,
        'slug' => $slug,
        'email' => $faker->companyEmail,
        'phone1' => $faker->unique()->phoneNumber,
        'phone2' => $faker->unique()->phoneNumber,
        'town' => $faker->state,
        'street' => $faker->city,
        'user_id' => $user_id,
    ];
});
