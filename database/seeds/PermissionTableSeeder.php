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
            ['name' => 'Créer un utilisateur', 'slug' => 'user_create'],
            ['name' => 'Modifier un utilisateur', 'slug' => 'user_update'],
            ['name' => 'Afficher les utilisateurs', 'slug' => 'user_show'],
            ['name' => 'Supprimer un utilisateur', 'slug' => 'user_delete'],
            ['name' => 'Creer un rôle/permission', 'slug' => 'permission_create'],
            ['name' => 'Modifier un rôle/permission', 'slug' => 'permission_update'],
            ['name' => 'Afficher les rôles/permission', 'slug' => 'permission_show'],
            ['name' => 'Supprimer un rôle/permission', 'slug' => 'permission_delete'],
            ['name' => 'Gérer les abonnements', 'slug' => 'subscription_manage'],
            ['name' => 'Etablir un bon de commande', 'slug' => 'bill_create'],
            ['name' => 'Modifier un bon de commande', 'slug' => 'bill_update'],
            ['name' => 'Supprimer un bon de commande', 'slug' => 'bill_delete'],
            ['name' => 'Afficher un bon de commande', 'slug' => 'bill_show'],
            ['name' => 'Annuler un bon de commande', 'slug' => 'bill_cancel'],
            ['name' => 'Imprimer un bon de commande', 'slug' => 'bill_print'],
            ['name' => 'Etablir une facture', 'slug' => 'invoice_create'],
            ['name' => 'Modifier une facture', 'slug' => 'invoice_update'],
            ['name' => 'Afficher une facture', 'slug' => 'invoice_create'],
            ['name' => 'Supprimer une facture', 'slug' => 'invoice_delete'],
            ['name' => 'Valider une facture', 'slug' => 'invoice_validate'],
            ['name' => 'Annuler une facture', 'slug' => 'invoice_cancel'],
            ['name' => 'Imprimer une facture', 'slug' => 'invoice_print'],
            ['name' => 'Gérer les categories', 'slug' => 'category_manage'],
            ['name' => 'Consulter les statistiques', 'slug' => 'reports'],
            ['name' => 'Gérer les charges', 'slug' => 'budget_manage'],
            ['name' => 'Créer un site', 'slug' => 'site_create'],
            ['name' => 'Afficher les sites', 'slug' => 'site_show'],
            ['name' => 'Modifier un site', 'slug' => 'site_update'],
            ['name' => 'Supprimer un site', 'slug' => 'site_delete'],
            ['name' => 'Créer un établissement', 'slug' => 'snack_create'],
            ['name' => 'Afficher les établissements', 'slug' => 'snack_show'],
            ['name' => 'supprimer un établissement', 'slug' => 'snack_delete'],
            ['name' => 'Modifier un établissement', 'slug' => 'snack_update'],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
