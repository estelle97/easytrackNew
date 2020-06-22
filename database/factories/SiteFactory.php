<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Site;
use Faker\Generator as Faker;

$factory->define(Site::class, function (Faker $faker) {
    return [
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
