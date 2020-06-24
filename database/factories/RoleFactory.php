<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    $name = $faker->unique()->randomElement(['serveur','caissier','magasinier','barman','gerant','boss']);
    $slug = $name;
    return [
        'name' => $name,
        'slug' => $slug,
    ];
});
