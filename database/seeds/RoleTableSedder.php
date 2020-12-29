<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Caissier', 'slug' => 'cashier'],
            ['name' => 'Serveur', 'slug' => 'server'],
            ['name' => 'Magasinier', 'slug' => 'storekeeper'],
            ['name' => 'Gérant', 'slug' => 'manager'],
            ['name' => 'Directeur Général', 'slug' => 'boss'],
        ];

        DB::table('roles')->insert($roles);

    }
}
