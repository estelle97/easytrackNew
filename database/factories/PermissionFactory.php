<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    $permission = $faker->unique()->randomElement(['create_user','read_user','update_user','delete_user']);
    $slug = $permission;
    return [
        'name' => $permission,
        'slug' => $slug,
    ];
});
