<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{   
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    
}
