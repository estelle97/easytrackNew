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
            ]
        ];

        DB::table('users')->insert($users);
    }

}
