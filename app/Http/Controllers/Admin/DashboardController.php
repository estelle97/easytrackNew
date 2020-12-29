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

    $sales = [];
    $purchases = [];
    $dates = [];
    for ($i=30; $i >= 0; $i--) {
        $totalSales = 0;
        $totalPurchases = 0;
        foreach(Auth::user()->companies->first()->sites as $site){
            foreach($site->sales->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $sale){
                $totalSales += $sale->total();
            }
        }

        foreach(Auth::user()->companies->first()->sites as $site){
            foreach($site->purchases->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                $totalPurchases += $purchase->total();
            }
        }

        $sales[] = $totalSales;
        $purchases[] = $totalPurchases;
        $dates[]= \Carbon\Carbon::today()->subDays($i)->toDateString();
    }

    // dump($purchases); dump($sales);  dump($dates);

        return view('admin.dashboard', compact('purchases','sales','dates'));
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
            'phone' => 'required|min:200000000|max:999999999|numeric'
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->bio = $request->bio;

        $photo = $request->file('photo');
        if($photo){
            $path = 'template/assets/static/users/'.Auth::user()->companies->first()->name.'/admin/';
            $fileName = $request->username.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $user->photo = $name;
        }

        $user->save();

        flashy()->info("Profil mis à jour avec succès!");
        return redirect()->back();
    }

    public function profileSettings(){
        return view('admin.profileSetting');
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        flashy()->info("Nous espérons vous revoir bientôt!", 'Au revoir');
        return redirect('/login');

      }


}
