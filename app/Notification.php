<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Site;
use App\Sale;

class Notification extends Model
{

    protected $guarded = ['id'];
    protected $table = 'notifications';
    public $timestamps = null;
    protected $dates = ['created_at'];

    public static function ProductAlert($user_id, Site $site, Product $product, $type=null){

        ($type == null) ?
                $text = "Le produit $product->name est en rupture de stock dans le site $site->name" :
                $text = "Le produit $product->name a atteint son minimum dans le site $site->name";

        return static::create([
            'company_id' => $site->company->id,
            'site_id' => $site->id,
            'user_id' => $user_id,
            'type' => 'productAlert',
            'text' => $text,
            'action' => 'purchases'
        ]);
    }

    public static function PackageAlert($user_id, Company $company, $jours){

        return static::create([
            'company_id' => $company->id,
            'user_id' => $user_id,
            'type' => 'packageAlert',
            'text' => "Votre abonnement se termine dans $jours jours Veuillez le renouveler",
            'action' => 'settings',
        ]);
    }

    public static function easyteckPackageAlert($user_id, Company $company, $days){

        return static::create([
            'company_id' => $company->id,
            'user_id' => $user_id,
            'type' => 'companyAlert',
            'text' => "L'abonnement de l'entreprise $company->name se termine dans $days jours",
            'action' => 'companies',
        ]);
    }

    public static function commandAlert($user_id, Site $site, Sale $sale){

        $user = Auth::user();
        return static::create([
            'company_id' => $site->company->id,
            'site_id' => $site->id,
            'user_id' => $user_id,
            'type' => 'commandAlert',
            'text' => "$user->name a pris la commande SO-$sale->code",
            'action' => 'sales.kanban'
        ]);
    }

    public static function validationAlert(Site $site, Sale $sale){

        return static::create([
            'company_id' => $site->company_id,
            'site_id' => $site->id,
            'user_id' => $sale->initiator_id,
            'type' => 'validationAlert',
            'text' => "Votre commande SO-$sale->code a été validée",
            'action' => 'sales.all'
        ]);
    }

    public static function addUserToTeamAlert(Site $site, User $user){
        return static::create([
            'company_id' => $site->company_id,
            'site_id' => $site->id,
            'user_id' => $user->id,
            'type' => 'addedToTeam',
            'text' => "Vous avez été ajouté(e) à une équipe de travail",
            'action' => 'teams'
        ]);
    }
}
