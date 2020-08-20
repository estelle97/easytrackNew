<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Action extends Model
{
    protected $guarded = ['id'];
    protected $table = 'actions';
    public $timestamps = null;
    protected $dates = ['created_at'];

    public static function store($target, $target_id, $type, $action, $link = null){
        if(Auth::user()->is_admin == 3){
            $company_id = null;
            $site_id = null;
        } else{
            if(Auth::user()->is_admin == 2){
                $company_id = Auth::user()->companies()->first()->id;
                $site_id = null;
            } else {
                $company_id = Auth::user()->employee->site->company->id;
                $site_id = Auth::user()->employee->site->id;
            }
        }
        return static::create([
            'company_id' => $company_id,
            'site_id' => $site_id,
            'initiator' => Auth::user()->name,
            'initiator_id' => Auth::user()->id,
            'target' => $target,
            'target_id' => $target_id,
            'level' => Auth::user()->is_admin,
            'type' => $type,
            'action' => $action,
            'link' => $link,
        ]);
    }

    public function initiator(){
        return $this->belongsTo('App\User');
    }

    public function site(){
        return $this->belongsTo('App\Site');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

}
