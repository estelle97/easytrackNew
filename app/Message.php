<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sender', 'receiver', 'message', 'status', 'file'
    ];
    protected $table = 'messages';


    public static function getRecipients(){

        if(Auth::user()->is_admin == 1){
            return $users = Auth::user()->employee->site->employees;
        }

        if(Auth::user()->is_admin == 3){
            return $users = \App\User::all();
        }

        if(Auth::user()->is_admin == 2){
            $users = [];
           foreach(Auth::user()->companies->first()->sites as $sites){
               foreach($sites->employees as $emp){
                   $users[] = $emp;
               }
           }

           return $users;
        }

    }
}
