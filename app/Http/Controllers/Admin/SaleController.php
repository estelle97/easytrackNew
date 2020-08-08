<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sale;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.pos');
    }

    public function getElementBySite(Request $request){
        $customers = '';
        $products = [];

    
        foreach (Site::find($request->site_id)->products as $prod) {
            $products[] = [
                'id' => $prod->id,
                'name' => $prod->name,
                'photo' => asset("template/assets/static/products/beer-2.jpg"),
                'category_id' => $prod->category_id,
                'qty'=> $prod->pivot->qty,
                'price' => $prod->pivot->price
            ];
            // $products .= "{id: '".$prod->id."', name: '".$prod->name."', photo:'".asset('template/assets/static/products/beer.jpg')."', category_id: '".$prod->category_id."', qty: '".$prod->pivot->qty."' price: '".$prod->pivot->price."'},";
        }

        // dd($products);

        foreach (Site::find($request->site_id)->customers as $cus) {
            $customers .= "<option value='".$cus->id."'> ".$cus->name."</option>";
        }

        return response()->json([
            "customers" => $customers,
            "products" => $products
        ], 200);
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
            'customer_id' => 'required',
            'order' => 'required',
        ]);

        do {
            $code = random_int(1000000, 9999999);
        } while(Sale::whereCode($code)->exists());

        $sale = new Sale([
            'code' => $code,
            'status' => $request->status,
            'site_id' => $request->site_id,
            'customer_id' => $request->customer_id,
            'initiator_id' => Auth::user()->id,
            'paying_method' => $request->paying_method,
            'shipping_cost' => $request->shipping_cost,
            'sale_note' => $request->sale_note,
        ]);

        DB::transaction(function () use($request,$sale){
            $products = explode('|', rtrim($request->order,'|'));
            $sale->save();
            foreach ($products as $prods) {
                $prod = explode(';', $prods);
                $sale->products()->attach($prod[0],[
                    'qty' => $prod[1],
                    'price' => $prod[2],
                    'site_id' => $request->site_id,
                ]);
            }
        });


        return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
