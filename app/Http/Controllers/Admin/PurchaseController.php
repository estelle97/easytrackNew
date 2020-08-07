<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;
use App\Purchase;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.purchases');
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
    public function store(Request $request)
    {
        $request->validate([
            'site_id' => 'required',
            'supplier_id' => 'required',
            'order' => 'required',
        ]);

        do {
            $code = rand(1000000000, 9999999999);
        } while(Purchase::whereCode($code)->exists());

        $purchase = new Purchase([
            'code' => $code,
            'status' => $request->status,
            'site_id' => $request->site_id,
            'supplier_id' => $request->supplier_id,
            'initiator_id' => Auth::user()->id,
            'paying_method' => $request->paying_method,
            'shipping_cost' => $request->shipping_cost,
            'purchase_text' => $request->purchase_text,
        ]);

        DB::transaction(function () use($request,$purchase){
            $products = explode('|', rtrim($request->order,'|'));
            $purchase->save();
            foreach ($products as $prods) {
                $prod = explode(';', $prods);
                $purchase->products()->attach($prod[0],[
                    'qty' => $prod[1],
                    'cost' => $prod[2],
                    'damages' => $prod[3],
                    'site_id' => $request->site_id,
                ]);
            }
        });


        return "success";
    }

    public function getElementBySite(Request $request){
        $suppliers = '';
        $products = '';

        foreach (Site::find($request->site_id)->suppliers as $supl) {
            $suppliers .= "<option value='".$supl->id."'> ".$supl->name."</option>";
        }

        foreach (Site::find($request->site_id)->products as $prod) {
            $products .= "<option class='product' data-id='".$prod->id."' data-qty='".$prod->pivot->qty."' data-price='".$prod->pivot->price."' value='".$prod->id."'> ".$prod->name."</option>";
        }

        return response()->json([
            "suppliers" => $suppliers,
            "products" => $products
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('ajax/admin/purchase_update', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
