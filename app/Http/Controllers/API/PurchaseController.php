<?php

namespace App\Http\Controllers\API;

use App\Purchase;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PurchaseResource::collection(Purchase::where('active','1')->get()->load('products'));
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
            do {
                $code = mt_rand(1000000000, 9999999999);
            } while(Purchase::whereCode($code)->exists());

            $purchase = Purchase::create([
                'code' => $code,
                'status' => '0',
                'site_id' => 1
            ]);
            $purchase->save();

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
        return new PurchaseResource($purchase->loadMissing('products'));
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
        $purchase->update([
            'status' => '1',
        ]);

        return response()->json([
            'message' => 'purchase updated susscessfully',
            'purchase' => new PurchaseResource($purchase),
        ],200);
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
