<?php

namespace App\Http\Controllers\API;

use App\Purchase;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;
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
        return PurchaseResource::collection(Purchase::all()->load('supplier','site','initiator','validator'));
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
                $code = mt_rand(1000000000, 9999999999);
            } while(Purchase::whereCode($code)->exists());

            $purchase = new Purchase([
                'code' => $code,
                'status' => 0,
                'site_id' => $request->site_id,
                'supplier_id' => $request->supplier_id,
                'initiator_id' => Auth::user()->id,
                'paying_method' => $request->paying_method,
                'shipping_cost' => $request->shipping_cost,
                'purchase_text' => $request->purchase_text,
            ]);

            DB::transaction(function () use($request,$purchase){
                $products = explode('|', $request->order);
                $purchase->save();
                foreach ($products as $prods) {
                    $prod = explode(';', $prods);
                    $purchase->products()->attach($prod[0],[
                        'qty' => $prod[1],
                        'cost' => $prod[2],
                        'damages' => $prod[3],
                    ]);
                }
            });


            return response()->json([
                'message' => 'purchase created susscessfully',
                'purchase' => new PurchaseResource($purchase),
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return new PurchaseResource($purchase->loadMissing('site','initiator','validator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
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
        $request->validate([
            'site_id' => 'required',
            'supplier_id' => 'required',
            'order' => 'required',
        ]);

        if(is_null($purchase->validator_id) && (Auth::user()->id == $purchase->initiator_id || Auth::user()->is_admin == 2)){

            DB::transaction(function () use($request,$purchase){
                $purchase->update([
                    'status' => 0,
                    'site_id' => $request->site_id,
                    'supplier_id' => $request->supplier_id,
                    'paying_method' => $request->paying_method,
                    'shipping_cost' => $request->shipping_cost,
                    'purchase_text' => $request->purchase_text,
                ]);

                $products = explode('|', $request->order);
                foreach ($products as $prods) {
                    $prod = explode(';', $prods);
                    $purchase->products()->updateExistingPivot($prod[0],[
                        'qty' => $prod[1],
                        'cost' => $prod[2],
                        'damages' => $prod[3],
                    ]);
                }
            });


            return response()->json([
                'message' => 'purchase updated susscessfully',
                'purchase' => new PurchaseResource($purchase),
            ],200);
        }

        return response()->json([
            'message' => 'unauthorized',
            'purchase' => new PurchaseResource($purchase),
        ],403);
    }

    public function validatePurchase(Request $request, Purchase $purchase){

        $purchase->validator_id = Auth::user()->id;
        $purchase->save();

        return response()->json([
            'message' => 'purchase validated susscessfully',
            'purchase' => new PurchaseResource($purchase),
        ],200);
    }

    public function invalidatePurchase(Request $request, Purchase $purchase){

        if(Auth::user()->id == $purchase->validator_id){
            $purchase->validator_id = null;
            $purchase->save();

            return response()->json([
                'message' => 'purchase validated susscessfully',
                'purchase' => new PurchaseResource($purchase),
            ],200);
        }

        return response()->json([
            'message' => 'unauthorized',
            'purchase' => new PurchaseResource($purchase),
        ],403);
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
