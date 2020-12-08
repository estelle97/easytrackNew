<?php

namespace App\Http\Controllers\Employee;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('employee.customers');
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
    public function store(CustomerStoreRequest $request)
    {

        if($request->site_id != 'all'){
            $customer = Customer::create($request->only(
                'name','company_name','email','phone','town','street','site_id'
            ));
        }else{
            foreach(Auth::user()->companies->first()->sites as $site){
                Customer::create([
                    'name' => $request->name,
                    'company_name' => $request->company_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'town' => $request->town,
                    'street' => $request->street,
                    'site_id' => $site->id,
                ]);
            }
        }

        flashy()->success("Le client a été ajouté avec succès");
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {

        $customer->update($request->only(
            'name','company_name','email','phone','town','street','site_id'
        ));

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return 'success';
    }
}
