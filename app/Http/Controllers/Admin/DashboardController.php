<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Helmesvs\Notify\Facades\Notify;

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
        return view('admin.dashboard');
    }

    

    public function profile()
    {
        return view('admin.profile');
    }

    public function profileEdit(){
        return view('admin.profileEdit');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'address' => 'required',
            'tel' => 'required|min:9|max:9'
        ]);
        
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->save();
        
        Notify::info("Profil mis à jour avec succès!");
        return redirect()->back();
    }

    public function profileSettings(){
        return view('admin.profileSetting');
    }

    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        Notify::info("Nous espérons vous revoir bientôt!", 'Au revoir');
        return redirect('/login');
        
      }


}
