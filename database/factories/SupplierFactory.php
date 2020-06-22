<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'tel1' => $faker->unique()->phoneNumber,
        'tel2' => $faker->unique()->phoneNumber,
        'site_id' => function(){
            return App\Site::all()->random()->id;
        }
    ];
});
