<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            [
                'code' => 'snack',
                'name' => 'Snack Bar'
            ],
            [
                'code' => 'bar',
                'name' => 'Bar'
            ],
            [
                'code' => 'longe',
                'name' => 'Snack Bar Longe'
            ],
            [
                'code' => 'restaurant',
                'name' => 'Restaurant'
            ],
            [
                'code' => 'restaurant-bar',
                'name' => 'Bar - Restaurant'
            ],
        ];

        DB::table('activities')->insert($activities);
    }
}
