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
        factory(\App\User::class, 4)->create();
        factory(\App\Company::class, 4)->create();
        factory(\App\Site::class, 30)->create();
        factory(\App\Supplier::class, 40)->create();
        factory(\App\Category::class, 5)->create();
        // factory(\App\Product::class, 100)->create();
        factory(\App\Type::class, 4)->create();

        $this->call([
            PermissionTableSeeder::class,
            RoleTableSedder::class,
            UserTableSeeder::class,
            ActivityTableSeeder::class
        ]);


        // Replissage de la table role_user
        App\User::all()->each(function($user){
            $user->role_id = App\Role::all()->random()->id;
            $user->save();
        });

        // Remplissage de la table activity_product
        App\Product::all()->each(function($product){
            $product->activities()->attach(1);
        });

        // Replissage de la table product_site
        foreach (App\Site::all() as $site) {

            // $products = App\Product::all('id')->random(rand(10,25));
            // foreach ($products as $prod) {
            //     $price = rand(4,20)*150;
            //     $cost = $price - $price * 0.1;
            //     $site->products()->attach($prod->id,[
            //         'price' => $price,
            //         'cost' => $cost,
            //         'qty' => rand(20, 30),
            //         'qty_alert' => 5,
            //     ]);
            // }

            $suppliers = App\Supplier::all()->random(rand(10,20));
            foreach ($suppliers as $supl) {
                $supl->site_id = $site->id;
                $supl->save();
            }

            App\Customer::create([
                'name' => 'Passager',
                'street' => $site->street,
                'town' => $site->town,
                'site_id' => $site->id
            ]);
        };


    }
}
