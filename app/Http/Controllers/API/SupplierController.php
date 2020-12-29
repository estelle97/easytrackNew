<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Site;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 2){
            $suppliers = Auth::user()->companies->first()->sites->load('suppliers');
        } else {
            $suppliers = Auth::user()->employee->site->suppliers;
        }
        return response()->json([
            'suppliers' => $suppliers
        ], 200);
    }

    public function suppliersSite(Site $site){
        return SupplierResource::collection($site->suppliers);
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
     * Store a newly created Supplier in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String name
     * @param String email
     * @param String tel1
     * @param String tel2 [optional]
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'tel1' => 'required',
        ]);

        $supplier = new Supplier([
            'name' => $request->name,
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'site_id' => 5,
        ]);
        $supplier->save();

        return response()->json([
            'message' => 'Supplier added successfully!',
            'supplier' => new SupplierResource($supplier->loadMissing('site')),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return new SupplierResource($supplier->loadMissing('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified Supplier in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'tel1' => 'required',
        ]);

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2
        ]);

        return response()->json([
            'message' => 'Supplier updated successfully!',
            'supplier' => new SupplierResource($supplier->loadMissing('site')),
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json([
            'message' => 'deleted successfully!'
        ], 200);
    }
}
