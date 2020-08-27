<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SiteStoreRequest;
use App\Http\Requests\SiteUpdateRequest;
use App\Site;
use App\Customer;
use Auth;
use App\Snack;
use App\User;
use DB;

class SiteController extends Controller
{
    public function index()
    {
        return view('admin.sites.sites');
    }

    public function store(SiteStoreRequest $request)
    {

        $site = new Site();
        $site->company_id = Auth::user()->companies()->first()->id;
        $site->name = $request->name;
        $site->slug= $this->makeSlug($request->name);
        $site->email = $request->email;
        $site->phone1 = $request->phone1;
        $site->phone2 = $request->phone2;
        $site->town = $request->town;
        $site->street = $request->street;

        if($site->save()){

            $customers = Customer::create([
                'name' => 'Passager',
                'street' => $site->street,
                'town' => $site->town,
                'site_id' => $site->id
            ]);

            flashy()->success('Le site a été ajouté avec succès');
            return 'success';
        } else {
            flashy()->success("Une erreur s'est produite lors de l'ajout du site ");
            return 'error';
        }
    }

    public function users($site_slug){

        $site = Site::whereSlug($site_slug)->first();
        return view('admin.sites.users', compact('site'));
    }


    public function update(SiteUpdateRequest $request)
    {

        $site = Site::find($request->site_id);

        $site->name = $request->name;
        $site->email = $request->email;
        $site->phone1 = $request->phone1;
        $site->phone2 = $request->phone2;
        $site->town = $request->town;
        $site->street = $request->street;

        if($site->save()){
            return 'success';
        } else {
            return 'error';
        }
    }

    public function destroy($id)
    {
        $lims_site_data = Site::find($id);
        $lims_site_data->delete();
        notify()->success('Site supprimé avec succès', 'Suppression de site');
        return redirect()->back();
    }
}
