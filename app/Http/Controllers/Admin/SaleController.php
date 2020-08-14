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
        return view('admin.orders.sales');
    }

    public function kanban(){
        return view('admin.orders.kanban');
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
                'photo' =>  asset($prod->photo),
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

    public function getElementBySale(Request $request, Sale $sale){
        $customers = '';
        $products = [];
        $saleProducts = [];

    
        foreach ($sale->site->products as $prod) {
            $products[] = [
                'id' => $prod->id,
                'name' => $prod->name,
                'photo' => asset($prod->photo),
                'category_id' => $prod->category_id,
                'qty'=> $prod->pivot->qty,
                'price' => $prod->pivot->price
            ];
        }

        foreach($sale->products as $sprod){
            $saleProducts[] = $sprod->id;
        }

        // dd($products);

        foreach ($sale->site->customers as $cus) {
            $customers .= "<option value='".$cus->id."'> ".$cus->name."</option>";
        }

        return response()->json([
            "customers" => $customers,
            "products" => $products,
            "saleProducts" => $saleProducts
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

        flashy()->success('La commande a été enregistré avec succès');
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
        return view('admin.orders.sale_order', compact('sale'));
    }

    public function stats(){
        $stats = [];

        if(Auth::user()->is_admin == 2){
            foreach (Auth::user()->companies->first()->sites as $site) {
                $stats[] = [
                    'site' => $site->name,
                    'allSales' => $site->allSales(),
                    'allPurchases' => $site->allPurchases(),
                    'dailySales' => $site->allSales(true),
                    'dailyPurchases' => $site->allPurchases(true),
                    'allIncomes' => $site->allSales() - $site->allPurchases(),
                    'dailyIncome' => $site->allSales(true) - $site->allPurchases(true),
                ];
            }

            return response()->json([
                'stats' => $stats,
            ], 200);
        } else {
            $site = Auth::user()->employee->site;

            return response()->json([
                'allSales' => $site->allSales(),
                'allPurchases' => $site->allPurchases(),
                'dailySales' => $site->allSales(true),
                'dailyPurchases' => $site->allPurchases(true),
                'allIncomes' => $site->allSales() - $site->allPurchases(),
                'dailyIncome' => $site->allSales(true) - $site->allPurchases(true),
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('admin.orders.pos_update', compact('sale'));
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
        $request->validate([
            'site_id' => 'required',
            'customer_id' => 'required',
            'order' => 'required',
        ]);


        $sale->customer_id = $request->customer_id;
        $sale->sale_note = $request->sale_note;
        $sale->shipping_cost = $request->shipping_cost;
        $sale->paying_method = $request->paying_method;
        $sale->status = $request->status;

        DB::transaction(function () use($request,$sale){
            $products = explode('|', rtrim($request->order,'|'));
            $sale->save();
            $sale->products()->detach();
            foreach ($products as $prods) {
                $prod = explode(';', $prods);
                $sale->products()->attach($prod[0],[
                    'qty' => $prod[1],
                    'price' => $prod[2],
                    'site_id' => $request->site_id,
                ]);
            }
        });

        flashy()->success('La commande a été mise à jour avec succès');
        return "success";
    }

    public function validateSale(Request $request, Sale $sale){

        if($sale->validator_id == null){
            $sale->validator_id = Auth::user()->id;
            foreach ($sale->products as $prod) {
                $qty = $sale->site->products()->findOrFail($prod->id)->pivot->qty - $prod->pivot->qty;
                $sale->site->products()->updateExistingPivot($prod->id, [
                    'qty' => $qty
                ]);
            }
            $sale->status = 2;
            $sale->save();
    
            return response()->json([
                'message' => 'sale validated susscessfully',
                'validator' => $sale->validator->username,
            ],200);
        }

        return response()->json([
            'message' => 'unauthorized',
        ],403);

    }

    public function invalidateSale(Request $request, Sale $sale){

        if($sale->validator_id != null){
            if(Auth::user()->id == $sale->validator_id){
                $sale->validator_id = null;
                foreach ($sale->products as $prod) {
                    $qty = $sale->site->products()->findOrFail($prod->id)->pivot->qty + $prod->pivot->qty;
                    $sale->site->products()->updateExistingPivot($prod->id, [
                        'qty' => $qty
                    ]);
                }
                $sale->status = 1;
                $sale->save();
    
                return response()->json([
                    'message' => 'sale unvalidated susscessfully',
    
                ],200);
            }
        }

        return response()->json([
            'message' => 'unauthorized',
        ],403);
    }

    public function updateSaleStatus(Request $request, Sale $sale){
        if($sale->validator_id == null){
            $sale->status = $request->status;
            $sale->save();
            
            return response()->json([
                'message' => 'Le statut de la commande a bien été mise à jour',
                'status' => $sale->status,
            ], 200);
        }

        return response()->json([
            'message' => 'La commande a déja été validée',
        ], 403);
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
