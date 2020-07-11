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
        factory(\App\User::class, 5)->create();
        factory(\App\Snack::class, 5)->create();
        factory(\App\Site::class, 30)->create();
        factory(\App\Supplier::class, 40)->create();
        factory(\App\Category::class, 5)->create();
        factory(\App\Product::class, 100)->create();
        factory(\App\Type::class, 4)->create();

        $this->call([
            PermissionTableSeeder::class,
            RoleTableSedder::class,
            UserTableSeeder::class,
        ]);

        // recuperation des roles
        $roles = App\Role::all();

        // Remplissement de la table role_user
        App\User::all()->each(function($user) use ($roles){
            $user->roles()->attach(
                $roles->random()->pluck('id')->toArray()
            );

            if($user->is_admin != '3'){
                $user->site_id = App\Site::all()->random()->id;
                $user->save();
            }
        });

        
    }
}
