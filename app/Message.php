<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sender', 'receiver', 'message', 'status', 'file'
    ];
    protected $table = 'messages';
}
