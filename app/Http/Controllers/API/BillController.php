<?php

namespace App\Http\Controllers\API;

use App\Bill;
use App\Http\Controllers\Controller;
use App\Http\Resources\BillResource;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BillResource::collection(Bill::where('is_active','1')->get()->load('products'));
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
            } while(Bill::whereCode($code)->exists());

            $bill = Bill::create([
                'code' => $code,
                'status' => '0',
                'site_id' => 1
            ]);
            $bill->save();

            return response()->json([
                'message' => 'Bill created susscessfully',
                'bill' => new BillResource($bill),
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return new BillResource($bill->loadMissing('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $bill->update([
            'status' => '1',
        ]);

        return response()->json([
            'message' => 'Bill updated susscessfully',
            'bill' => new BillResource($bill),
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
