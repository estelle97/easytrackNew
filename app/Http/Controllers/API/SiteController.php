<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\SiteResource;
use App\Http\Resources\SupplierResource;
use App\Site;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 2){
            $sites = Auth::user()->companies->first()->sites;
        } else {
            $sites = Auth::user()->employee->site;
        }
        return SiteResource::collection($sites->load('employees.user.role','customers','suppliers'));
    }

    public function sitesSuppliers(Site $site){
        return SupplierResource::collection($site->suppliers);
    }

    public function sitesCustomers(Site $site){
        return CustomerResource::collection($site->customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Store in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String email
     * @param String phone1
     * @param String phone2 [optional]
     * @param String town
     * @param String street
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required|string',
            'phone1' => 'required',
            'town' => 'required',
            'street' => 'required',
            'company_id' => 'required'
        ]);

        $site = new Site([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'email' => $request->email,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'town' => $request->town,
            'street' => $request->street,
            'company_id' => $request->company_id,
        ]);

        $site->save();

        $customers = Customer::create([
            'name' => 'Passager',
            'street' => $site->street,
            'town' => $site->town,
            'site_id' => $site->id
        ]);

        return response()->json([
            'message' => 'Site created successfully!',
            'site' => new SiteResource($site->loadMissing('company')),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        return new SiteResource($site->loadMissing('employees.user.role','customers','suppliers'));
    }


    public function stats(Site $site){

        return response()->json([
            'allSales' => $site->allSales(),
            'allPurchases' => $site->allPurchases(),
            'dailySales' => $site->allSales(true),
            'dailyPurchases' => $site->allPurchases(true),
            'allIncomes' => $site->allSales() - $site->allPurchases(),
            'dailyIncome' => $site->allSales(true) - $site->allPurchases(true),
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @param String email
     * @param String phone1
     * @param String phone2 [optional]
     * @param String town
     * @param String street
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required|string',
            'phone1' => 'required',
            'town' => 'required',
            'street' => 'required',
        ]);

        $site->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'town' => $request->town,
            'street' => $request->street,
        ]);

        return response()->json([
            'message' => 'Site updated successfully!',
            'site' => new SiteResource($site->loadMissing('company')),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
