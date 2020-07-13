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
        return view('admin.sites');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sites',
            'email' => 'email|required',
            'tel1' => 'required|min:200000000|max:999999999|numeric|unique:sites',
            'town' => 'required',
            'street' => 'required'
        ]);

        $site = new Site();
        $site->snack_id = Auth::user()->snacks()->first()->id;
        $site->name = $request->name;
        $site->slug= $this->makeSlug($request->name);
        $site->email = $request->email;
        $site->tel1 = $request->tel1;
        $site->tel2 = $request->tel2;
        $site->town = $request->town;
        $site->street = $request->street;

        if($site->save()){
            return 'success';
        } else {
            return 'error';
        }
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'tel1' => 'required|min:200000000|max:999999999|numeric',
            'town' => 'required',
            'street' => 'required'
        ]);

        $site = Site::find($request->site_id);
        
        $site->name = $request->name;
        $site->email = $request->email;
        $site->tel1 = $request->tel1;
        $site->tel2 = $request->tel2;
        $site->town = $request->town;
        $site->street = $request->street;

        if($site->save()){
            return 'success';
        } else {
            return 'error';
        }
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
