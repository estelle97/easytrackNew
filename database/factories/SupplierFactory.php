<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company_name' => $faker->company,
        'email' => $faker->companyEmail,
        'phone1' => $faker->unique()->phoneNumber,
        'phone2' => $faker->unique()->phoneNumber,
        'town' => $faker->state,
        'street' => $faker->city,
        'site_id' => function(){
            return App\Site::all()->random()->id;
        }
    ];
});
