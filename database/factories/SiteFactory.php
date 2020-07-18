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
        'phone1' => $faker->unique()->phoneNumber,
        'phone2' => $faker->unique()->phoneNumber,
        'town' => $faker->state,
        'street' => $faker->city,
        'company_id' => function(){
            return App\Company::all()->random()->id;
        }
    ];
});
