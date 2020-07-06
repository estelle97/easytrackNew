<?php

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
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@easytrack.com',
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
    }

}
