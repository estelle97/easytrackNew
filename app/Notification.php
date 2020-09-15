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

    public static function ProductAlert(Site $site, Product $product, $type=null){ 
        
        (Auth::user()->is_admin == 2) ? $action =  'admin.purchases' : $action = 'employee.purchases';

        ($type == null) ? 
                $text = "Le produit $product->name est en rupture de stock dans le site $site->name" :
                $text = "Le produit $product->name a atteint son minimum dans le site $site->name";

        return static::create([
            'company_id' => $site->company->id,
            'site_id' => $site->id,
            'type' => 'productAlert',
            'text' => $text,
            'action' => $action
        ]);
    }

    public static function PackageAlert(Company $company, $jours){ 

        return static::create([
            'company_id' => $company->id,
            'type' => 'packageAlert',
            'text' => "Votre abonnement se termine dans $jours jours Veuillez le renouveler",
            'action' => 'admin.settings',
        ]);
    }

    public static function commandAlert(Site $site, Sale $sale){ 
        
        (Auth::user()->is_admin == 2) ? $action =  'admin.kanban' : $action = 'employee.kanban';
        $user = Auth::user();
        return static::create([
            'company_id' => $site->company->id,
            'site_id' => $site->id,
            'type' => 'commandAlert',
            'text' => "$user->name a pris la commande SO-$sale->code du client ".$sale->customer->name,
            'action' => $action
        ]);
    }
}
