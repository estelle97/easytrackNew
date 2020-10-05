<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    $title = $faker->unique()->randomElement(['essaie','Basic','Premium','Premium Confort']);

    if($title == 'essaie') $duration = 15;
    if($title == 'Basic') $duration = 30;
    if($title == 'Premium') $duration = 30;
    if($title == 'Premium Confort') $duration = 30;

    if($title == 'essaie') $price = 0;
    if($title == 'Basic') $price = 40000;
    if($title == 'Premium') $price = 50000;
    if($title == 'Premium Confort') $price = 70000;
    
    return [
        'title' => $title,
        'duration' => $duration,
        'price' => $price,
        'number_of_site' => 10,
        'number_of_employee' => 20,
    ];
});
