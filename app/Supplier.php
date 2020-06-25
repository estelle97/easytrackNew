<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = ['id'];

    public function site(){
        return $this->belongsTo('App\Site');
    }
}
