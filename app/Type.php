<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function companies(){
        return $this->belongsToMany('App\Company', 'subscriptions')->withPivot('end_date','status','is_active','created_at');
    }

    public function numberOfUsers(){
        $users = 0;

        foreach (\App\Company::all() as $com) {
            if($com->types->last()->title == $this->title) $users += 1;
        }

        return $users;
    }

    public function usage(){
        $users = $this->numberOfUsers();
        $subscriptionNumber = 0;
        foreach (Type::all() as $type) {
            $subscriptionNumber += $type->numberOfUsers();
        }

        if($subscriptionNumber == 0) return 0;
        return ($users/$subscriptionNumber)*100;
    }
}
