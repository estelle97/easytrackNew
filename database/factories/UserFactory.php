<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $is_admin = $faker->randomElement(['1','2','3']);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'username' => $faker->userName,
        'is_admin' => $is_admin,
        'address' => $faker->address,
        'site_id' => ($is_admin == '1') ? function(){
            return App\Site::all()->random()->id;
        } : null,
        'snack_id' => ($is_admin == '2') ? function(){
            return App\Snack::all()->random()->id;
        } : null,
        'role_id' => function(){
            return App\Role::all()->random()->id;
        }
    ];
});
