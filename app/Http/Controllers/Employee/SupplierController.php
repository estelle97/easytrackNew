<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierStoreRequest;
use App\Http\Requests\SupplierUpdateRequest;
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

        return view('employee.suppliers');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierStoreRequest $request)
    {

        if($request->site_id != 'all'){
            $supplier = Supplier::create($request->only(
                'name','company_name','email','phone1','phone2','town','street','postal_code','site_id'
            ));
        }else{
            foreach(Auth::user()->companies->first()->sites as $site){
                Supplier::create([
                    'name' => $request->name,
                    'company_name' => $request->company_name,
                    'email' => $request->email,
                    'phone1' => $request->phone1,
                    'phone2' => $request->phone2,
                    'town' => $request->town,
                    'street' => $request->street,
                    'postal_code' => $request->postal_code,
                    'site_id' => $site->id,
                ]);
            }
        }

        flashy()->success("Le fournisseur a été ajouté avec succès");
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierUpdateRequest $request, Supplier $supplier)
    {

        $supplier->update($request->only(
            'name','company_name','email','phone1','phone2','town','street','postal_code','site_id'
        ));

        return 'success';
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
        return 'success';
    }
}
