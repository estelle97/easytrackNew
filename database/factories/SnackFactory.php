<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Snack;
use App\User;
use Faker\Generator as Faker;

$factory->define(Snack::class, function (Faker $faker) {
    $name = $faker->unique()->company;
    $slug = preg_replace('~[^\pL\d]+~u', '-', preg_replace('~[^-\w]+~', '', strtolower($name)));
    return [
        'name' => $name,
        'slug' => $slug,
        'email' => $faker->companyEmail,
        'tel1' => $faker->unique()->phoneNumber,
        'tel2' => $faker->unique()->phoneNumber,
        'town' => $faker->state,
        'street' => $faker->city,
        'user_id' => function(){
            return User::where('is_admin','2')->get()->random()->id;
        }
    ];
});
