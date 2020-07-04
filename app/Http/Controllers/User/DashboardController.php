<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$user = User::findOrFail(Auth::id());
        //dd($user->can('permission-slug'));
        $user = Auth::user();
        $users = $request->user();
        //dd($users->hasRole('gerant'));
        //dd($users->can('create_user'));
        return view('user.dashboard.home', compact('user'));
    }
}
