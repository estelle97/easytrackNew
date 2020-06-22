<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    $title = $faker->unique()->randomElement(['simple','silver','bronze','gold']);

    if($title == 'simple') $duration = 1;
    if($title == 'silver') $duration = 3;
    if($title == 'bronze') $duration = 6;
    if($title == 'gold') $duration = 12;

    if($title == 'simple') $price = 10000;
    if($title == 'silver') $price = 25000;
    if($title == 'bronze') $price = 50000;
    if($title == 'gold') $price = 100000;
    
    return [
        'title' => $title,
        'duration' => $duration,
        'price' => $price,
    ];
});
