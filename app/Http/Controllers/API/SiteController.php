<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\SiteResource;
use App\Http\Resources\SupplierResource;
use App\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SiteResource::collection(Site::all()->load('employees.user','company','products','suppliers'));
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
        return new SiteResource($site->loadMissing('employees.user.role','company','products','suppliers'));
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
