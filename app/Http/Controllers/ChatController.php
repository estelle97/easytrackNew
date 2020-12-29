<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('chat');
    }

    function getContacts(){
        $contacts = [];

        if(Auth::user()->is_admin == 2){
            foreach (Auth::user()->companies->first()->sites as $site) {
                foreach ($site->employees as $emp) {
                    $contacts[] = $emp->user->load('role');
                }
            }
        } else {
            foreach (Auth::user()->employee->site->employees as $emp) {
                $contacts[] = $emp->user->load('role');
            }
        }

        return response()->json([
            'contacts' => $contacts,
        ], 200);
    }
}
