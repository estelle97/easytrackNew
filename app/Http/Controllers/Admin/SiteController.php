<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Site;
use Auth;
use App\Snack;
use App\User;
use DB;

class SiteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        /*$lims_site_all = DB::table('sites')
        ->join('snacks','sites.snack_id', '=', 'snacks.id')
        ->join('users', 'snacks.user_id', '=', 'users.id')
        ->select('sites.id','sites.name','sites.email','sites.slug','snacks.name','users.name', 'snacks.email')
        ->get();*/
        $lims_site_all = Site::where('active', '1')->get()->load('users','snack','products','suppliers');
        return view('admin.sites.index', compact('user', 'lims_site_all'));
    }

    public function store(Request $request)
    {
        $tel_code = "+237";

        $site = new Site();
        $site->snack_id = 100;
        $site->email = $request->email;
        $site->tel1 = $tel_code.$request->tel1;
        $site->active = 1;
        $site->tel2 = $tel_code.$request->tel2;
        $site->town = $request->town;
        $site->name = $request->name;
        $site->slug= preg_replace('~[^\pL\d]+~u', '-', preg_replace('~[^-\w]+~', '', strtolower($site->name)));
        $site->street = $request->street;
        $site->save();
        $name = $request->name;
        notify()->success('Site '.$name.' ajouté avec succès', 'Ajout de site');
        return redirect()->back();
    }

    public function edit($id)
    {
        $lims_site_data = Site::find($id);
        return $lims_site_data;
    }

    public function destroy($id)
    {
        $lims_site_data = Site::find($id);
        $lims_site_data->delete();
        notify()->success('Site supprimé avec succès', 'Suppression de site');
        return redirect()->back();
    }
}
