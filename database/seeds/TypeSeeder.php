<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'title' => 'test',
                'duration' => '30',
                'number_of_site' => '2',
                'number_of_employee' => '10',
                'price' => '0'
            ]
        ];

        DB::table('types')->insert($types);

    }
}
