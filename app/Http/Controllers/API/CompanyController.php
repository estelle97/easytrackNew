<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyResource::collection(Company::all()->load('owner','sites.employees.user','types'));
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
     * Store a newly created Company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String name
     * @param String email
     * @param String phone1
     * @param String phone2 [optional]
     * @param String town
     * @param String steet
     * @param File logo [optional]
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:companies',
            'email' => 'email|required|string|unique:companies',
            'phone1' => 'required|unique:companies',
            'town' => 'required',
            'street' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $company = new Company([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'email' => $request->email,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'town' => $request->town,
            'street' => $request->street,
        ]);

        $company->save();

        return response()->json([
            'message' => 'company created successfully',
            'company' => new CompanyResource($company),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return new CompanyResource($company->loadMissing('owner','sites.employees.user','types'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @param String name
     * @param String email
     * @param String phone1
     * @param String phone2 [optional]
     * @param String town
     * @param String steet
     * @param File logo [optional]
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|string',
            'phone1' => 'required',
            'town' => 'required',
            'street' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $company->update([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'email' => $request->email,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'town' => $request->town,
            'street' => $request->street,
        ]);

        return response()->json([
            'message' => 'company updated successfully',
            'company' => new CompanyResource($company),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
