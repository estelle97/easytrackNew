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
use App\Helpers\Sms;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
    }

    public function switchAccount(Request $request){

        $user = User::whereUsername($request->username)->first();


        if(Hash::check($request->password, $user->password)) {
            Auth::login($user);
            flashy()->info("Connexion réussie!");
            return response()->json([
                'is_admin' => $user->is_admin
            ]);
        } else {
            return 'error';
        }

    }

    public function adminResetPassword(Request $request,User $user){
        $request->validate([
            'password' => 'required|min:8',
        ]);

        $user->password = bcrypt($request->password);
        $user->save();

        return 'success';
    }

    public function sendSMS($phone, $message)
    {
        $config = array(
            'clientId' => config('app.clientId'),
            'clientSecret' =>  config('app.clientSecret'),
        );

        $osms = new Sms($config);

        $data = $osms->getTokenFromConsumerKey();
        $token = array(
            'token' => $data['access_token']
        );


        $response = $osms->sendSms(
            // sender
            'tel:+2370000',
            // receiver
            'tel:+237' . $phone,
            // message
            $message,
            'Devscom'
        );
    }

    /***********************************/
    /*     Génère un mot de passe      */
    /***********************************/

    // $size : longueur du mot passe voulue
function generatePassword($size)
{
    $password = '';

    // Initialisation des caractères utilisables
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    for($i=0;$i<$size;$i++)
    {
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }

    return $password;
}
}
