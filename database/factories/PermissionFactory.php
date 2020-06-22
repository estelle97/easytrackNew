<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'permission' => $faker->unique()->randomElement(['lire','modifier','supprimer','ecrire']),
    ];
});
