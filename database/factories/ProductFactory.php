<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'code' => $faker->unique()->ean13,
        'description' => $faker->text,
        'brand' => $faker->company,
        'category_id' => function(){
            return App\Category::all()->random()->id;
        }
    ];
});
