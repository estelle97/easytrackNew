<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Twilio\Rest\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


        /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    public function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");

        $account_sid = "AC10531d636e939b0ee4c01cb7b4c0ec2a";
        $auth_token = "18336d99571f306bcc0ff1d8c791e987";
        $twilio_number = "+12055840409";

        $client = new Client($account_sid, $auth_token);
        $client->messages->create('+237'.$recipients, 
                ['from' => $twilio_number, 
                'body' => $message] 
        );
    }

    public function makeSlug($text){
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        //trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowcase
        $text = strtolower($text);

        if(empty($text)){
            return 'n-a';
        }

        return $text;
    }

    public function totalPurchases(){
        $total = 0;
        if(Auth::user()->is_admin == 2){
            foreach (Auth::user()->companies()->first()->sites as $site) {
                $total += $site->purchases()->where('validator_id','!=', null)->total();
            }
        } else {
            foreach (Auth::user()->employee->site->purchases->where('validator_id','!=', null) as $pur) {
                $total += $pur->total();
            }
        }

        return $total;
    }
}
