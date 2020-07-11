<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use SoftDeletes;
    
    protected $guraded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    
}
