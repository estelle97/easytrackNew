<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\Snack::class, 10)->create();
        factory(\App\Site::class, 30)->create();
        factory(\App\Supplier::class, 40)->create();
        factory(\App\Role::class, 60)->create();
        factory(\App\User::class, 100)->create();
        factory(\App\Category::class, 5)->create();
        factory(\App\Product::class, 100)->create();
        factory(\App\Type::class, 4)->create();
        factory(\App\Permission::class, 4)->create();
    }
}
