<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Super Administrator',
                'username' => 'superAdmin',
                'email' => 'superadmin@easytrack.com',
                'phone' => '123456789',
                'password' => bcrypt('password'),
                'is_admin' => '3',
                'address' => 'Bastos - Yaoundé',
            ],
            [
                'name' => 'Steve Wiltek',
                'username' => 'wiltek',
                'email' => 'wiltek@easytrack.com',
                'phone' => '698154430',
                'password' => bcrypt('password'),
                'is_admin' => '3',
                'address' => 'Santa Barbara - Yaoundé',
            ],
            [
                'name' => 'Estelle Belinga',
                'username' => 'estelle',
                'email' => 'estelle@easytrack.com',
                'phone' => '659401381',
                'password' => bcrypt('password'),
                'is_admin' => '2',
                'address' => 'Awaie Escalier - Yaoundé',
            ],
            [
                'name' => 'Administrateur Directeur',
                'username' => 'admin',
                'email' => 'admin@easytrack.com',
                'phone' => '687601381',
                'password' => bcrypt('password'),
                'is_admin' => '2',
                'address' => 'Akwa  - Douala',
            ]
        ];

        DB::table('users')->insert($users);

        $companies= [
            [
                'user_id' => User::whereUsername('estelle')->first()->id,
                'name' => 'Famous',
                'slug' => 'slug1',
                'email' => 'famous@gmail.com',
                'phone1' => '223344556',
                'town' => 'Yaoundé',
                'street' => 'Miniprix Bastos',
            ],
            [
                'user_id' => User::whereUsername('admin')->first()->id,
                'name' => 'Le Relais de la Citée',
                'slug' => 'slug2',
                'email' => 'lerelais@gmail.com',
                'phone1' => '223984456',
                'town' => 'Yaoundé',
                'street' => 'Elig-edzoa Pharmacie',
            ]
        ];

        DB::table('companies')->insert($companies);
    }

}
