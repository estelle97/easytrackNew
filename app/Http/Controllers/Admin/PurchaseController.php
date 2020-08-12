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
        return view('ajax.admin.purchase_create');
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
            $code = random_int(1000000, 9999999);
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

        flashy()->success('La commande a été enregistré avec succès');

        return "success";
    }

    public function getElementBySite(Request $request){
        $suppliers = '';
        $products = "<option selected> Sélectionnez un produit </option>";

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
        return view('admin.orders.purchase_order', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $products = [];
        foreach($purchase->products as $prod){
            $products[] = $prod->id;
        }

        return response()->json([
            'products' => $products,
            'view' =>  (string)view('ajax/admin/purchase_update', compact('purchase')),
        ], 200);
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

        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchase_text = $request->purchase_text;
        $purchase->shipping_cost = $request->shipping_cost;
        $purchase->paying_method = $request->paying_method;
        $purchase->status = $request->status;
        
       
        DB::transaction(function () use($request,$purchase){
            $products = explode('|', rtrim($request->order,'|'));
            $purchase->save();
            $purchase->products()->detach();
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

        flashy()->success('La commande a été mise à jour avec succès');

        return "success";
    }

    public function validatePurchase(Request $request, Purchase $purchase){

        if($purchase->validator_id == null){
            $purchase->validator_id = Auth::user()->id;
            foreach ($purchase->products as $prod) {
                $qty = $purchase->site->products()->findOrFail($prod->id)->pivot->qty + $prod->pivot->qty;
                $purchase->site->products()->updateExistingPivot($prod->id, [
                    'qty' => $qty
                ]);
            }
            $purchase->status = 1;
            $purchase->save();
    
            return response()->json([
                'message' => 'purchase validated susscessfully',
                'validator' => $purchase->validator->username,
            ],200);
        }

        return response()->json([
            'message' => 'unauthorized',
        ],403);        
    }

    public function invalidatePurchase(Request $request, Purchase $purchase){

        if($purchase->validator != null){
            if(Auth::user()->id == $purchase->validator_id){
                $purchase->validator_id = null;
                foreach ($purchase->products as $prod) {
                    $qty = $purchase->site->products()->findOrFail($prod->id)->pivot->qty - $prod->pivot->qty;
                    $purchase->site->products()->updateExistingPivot($prod->id, [
                        'qty' => $qty
                    ]);
                }
                $purchase->save();
    
                return response()->json([
                    'message' => 'purchase unvalidated susscessfully',
                ],200);
            }
        }

        return response()->json([
            'message' => 'unauthorized',
        ],403);
    }

    public function updatePurchaseStatus(Request $request, Purchase $purchase){
        if($purchase->status == 0){
            $purchase->status = 1;
            $purchase->save();
            return $purchase->status;
        } else {
            if($purchase->validator == null){
                $purchase->status = 0;
                $purchase->save();
                return $purchase->status;
            }
        }

        return response()->json([
            'message' => 'La commande a déja été validée',
        ], 403);
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
