<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function site(){
        return $this->belongsTo('App\Site');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
