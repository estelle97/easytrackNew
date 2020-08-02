<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('superAdmin.dashboard');
    }



    public function profile()
    {
        return view('superAdmin.profile');
    }

    public function profileEdit(){
        return view('superAdmin.profileEdit');
    }

    public function profileUpdate(UserUpdateRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->save();

        flashy()->info("Profil mis à jour avec succès!");
        return redirect()->back();
    }

    public function profileSettings(){
        return view('superAdmin.profileSetting');
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        flashy()->info("Nous espérons vous revoir bientôt!", 'Au revoir');
        return redirect('/login');

      }
}
