<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Site;
use Faker\Generator as Faker;

$factory->define(Site::class, function (Faker $faker) {
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
        'snack_id' => function(){
            return App\Snack::all()->random()->id;
        }
    ];
});
