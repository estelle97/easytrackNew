<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'role' => $faker->randomElement(['serveur','caissier','barman','gerant','boos']),
        'site_id' => function(){
            return App\Site::all()->random()->id;
        }
    ];
});
