<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'Consulter les employés', 'slug' => 'show_employee'],
            ['name' => 'Gérer les employés', 'slug' => 'manage_employee'],
            ['name' => 'Supprimer un utilisateur', 'slug' => 'user_delete'],

            ['name' => 'Consulter les permissions', 'slug' => 'show_permissions'],
            ['name' => 'Gérer le rôle et les Permisisons', 'slug' => 'manage_role_and_permissions'],

            ['name' => 'Consulter les bons de commandes', 'slug' => 'show_purchase_orders'],
            ['name' => 'Imprimer les bons de commande', 'slug' => 'print_purchase_orders'],
            ['name' => 'Etablir les bons de commande', 'slug' => 'create_purchase_orders'],
            ['name' => 'Valider les bons de commande', 'slug' => 'validate_purchase_orders'],
            ['name' => 'Supprimer les bons de commande', 'slug' => 'delete_purchase_orders'],

            ['name' => 'Consulter les commandes clientes', 'slug' => 'show_sale_orders'],
            ['name' => 'Imprimer les commandes clientes', 'slug' => 'print_sale_orders'],
            ['name' => 'Etablir les commandes clientes', 'slug' => 'create_sale_orders'],
            ['name' => 'Valider les commandes clientes', 'slug' => 'validate_sale_orders'],
            ['name' => 'Supprimer les commandes clientes', 'slug' => 'delete_sale_orders'],

            ['name' => 'Gérer le site', 'slug' => 'manage_site'],


            ['name' => 'Consulter la liste de produits', 'slug' => 'show_products'],
            ['name' => 'Modifier les produits', 'slug' => 'update_products'],
            ['name' => 'Supprimer les produits', 'slug' => 'delete_products'],


            ['name' => 'Consulter la liste des fournisseurs', 'slug' => 'show_suppliers'],
            ['name' => 'Modifier les fournisseurs', 'slug' => 'update_suppliers'],
            ['name' => 'Supprimer les fournisseurs', 'slug' => 'delete_suppliers'],

            ['name' => 'Consulter la liste des clients', 'slug' => 'show_customers'],
            ['name' => 'Modifier les clients', 'slug' => 'update_customers'],
            ['name' => 'Supprimer les clients', 'slug' => 'delete_customers'],

            ['name' => 'Créer un site', 'slug' => 'site_create'],
            ['name' => 'Modifier un site', 'slug' => 'site_update'],
            ['name' => 'Supprimer un site', 'slug' => 'site_delete'],

            ['name' => 'Consulter les équipes de travail', 'slug' => 'show_teams'],
            ['name' => 'Gérer les équipes de travail', 'slug' => 'manage_teams'],
            ['name' => 'Supprimer une équipe de travail', 'slug' => 'delete_team'],

            ['name' => 'Gérer les charges', 'slug' => 'manage_expenses'],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
