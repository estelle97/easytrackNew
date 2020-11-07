<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\register;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
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

    public function sendMail($to, Company $company){
        Mail::to($to)->send(new register($company));
        flashy()->success('tout est bon pour le mail');

    }

    public function switchAccount(Request $request){

        $user = User::whereUsername($request->username)->first();


        if(Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return response()->json([
                'is_admin' => $user->is_admin
            ]);
        } else {
            return 'error';
        }

    }
}
