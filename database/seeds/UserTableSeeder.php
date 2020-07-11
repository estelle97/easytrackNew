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
                'tel' => '123456789',
                'password' => bcrypt('password'),
                'is_admin' => '3',
                'address' => 'Bastos - Yaoundé',
            ],
            [
                'name' => 'Steve Wiltek',
                'username' => 'wiltek',
                'email' => 'wiltek@easytrack.com',
                'tel' => '698154430',
                'password' => bcrypt('password'),
                'is_admin' => '3',
                'address' => 'Santa Barbara - Yaoundé',
            ],
            [
                'name' => 'Estelle Belinga',
                'username' => 'estelle',
                'email' => 'estelle@easytrack.com',
                'tel' => '659401381',
                'password' => bcrypt('password'),
                'is_admin' => '2',
                'address' => 'Awaie Escalier - Yaoundé',
            ],
            [
                'name' => 'Administrateur Directeur',
                'username' => 'admin',
                'email' => 'admin@easytrack.com',
                'tel' => '687601381',
                'password' => bcrypt('password'),
                'is_admin' => '2',
                'address' => 'Akwa  - Douala',
            ]
        ];

        DB::table('users')->insert($users);

        $snacks= [
            [
                'user_id' => User::whereUsername('estelle')->first()->id,
                'name' => 'Famous',
                'slug' => 'slug1',
                'email' => 'famous@gmail.com',
                'tel1' => '223344556',
                'town' => 'Yaoundé',
                'street' => 'Miniprix Bastos',
            ],
            [
                'user_id' => User::whereUsername('admin')->first()->id,
                'name' => 'Le Relais de la Citée',
                'slug' => 'slug2',
                'email' => 'lerelais@gmail.com',
                'tel1' => '223984456',
                'town' => 'Yaoundé',
                'street' => 'Elig-edzoa Pharmacie',
            ]
        ];

        DB::table('snacks')->insert($snacks);
    }

}
