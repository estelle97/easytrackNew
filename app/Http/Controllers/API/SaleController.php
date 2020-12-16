<?php

namespace App\Http\Controllers\API;

use App\Action;
use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Notification;
use App\Sale;
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
        if(Auth::user()->is_admin == 2){
            $sales = Auth::user()->companies->first()->sites->load('sales.customer','sales.initiator','sales.validator','sales.products');
        } else {
            $sales = Auth::user()->sales->load('customer','initiator','validator','products');
        }

        return response()->json([
            'sales' => $sales,
        ], 200);
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
            'seller_note' => $request->seller_note,
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

        Action::store('Sale', $sale->id, 'create',
            "Initiation de la commande client SO-".$sale->code
        );

        foreach ($sale->site->employees()->whereHas('user.role', function($query){$query->where('roles.slug','cashier');})->get()->load('user') as $key => $emp) {
            Notification::commandAlert($emp->user->id, $sale->site, $sale);
        }

        return response()->json([
            'message' => 'sale created susscessfully',
            'sale' => new SaleResource($sale),
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return new SaleResource($sale->loadMissing('site','validator'));
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
        $request->validate([
            'site_id' => 'required',
            'order' => 'required',
        ]);

        if(is_null($sale->validator_id) && (Auth::user()->id == $sale->initiator_id || Auth::user()->is_admin == 2)){

            DB::transaction(function () use($request,$sale){
                $sale->update([
                    'site_id' => $request->site_id,
                    'customer_id' => $request->customer_id,
                    'paying_method' => $request->paying_method,
                    'shipping_cost' => $request->shipping_cost,
                    'sale_note' => $request->sale_note,
                    'seller_note' => $request->seller_note,
                    'status' => $request->status,
                ]);

                $products = explode('|', rtrim($request->order,'|'));
                foreach ($products as $prods) {
                    $prod = explode(';', $prods);
                    if($sale->products->contains($prod[0])){
                        $sale->products()->updateExistingPivot($prod[0],[
                            'qty' => $prod[1],
                            'price' => $prod[2],
                        ]);
                    } else {
                        $sale->products()->attach($prod[0],[
                            'qty' => $prod[1],
                            'price' => $prod[2],
                        ]);
                    }
                }
            });

            Action::store('Sale', $sale->id, 'update',
                "Mise à jour de la commande client SO-".$sale->code
            );

            return response()->json([
                'message' => 'sale updated susscessfully',
                'sale' => new SaleResource(Sale::find($sale->id)->load('validator')),
            ],200);
        }

        return response()->json([
            'message' => 'unauthorized',
            'sale' => new SaleResource($sale->load('validator')),
        ],403);
    }

    public function validateSale(Request $request, Sale $sale){


        if($sale->validator_id == null){
            $sale->validator_id = Auth::user()->id;
            foreach ($sale->products as $prod) {
                $qty = $sale->site->products()->findOrFail($prod->id)->pivot->qty - $prod->pivot->qty;
                $sale->site->products()->updateExistingPivot($prod->id, [
                    'qty' => $qty
                ]);

                if($qty <= $sale->site->products()->findOrFail($prod->id)->pivot->qty_alert){
                    if($qty == 0){
                        foreach ($sale->site->employees()->whereHas('user.role', function($query){$query->where('roles.slug','cashier')->orWhere('roles.slug','storekeeper')->orWhere('roles.slug','manager');})->get()->load('user') as $key => $emp) {
                            Notification::ProductAlert($emp->user->id, $sale->site, $prod, 'empty');
                        }
                    } else {
                        foreach ($sale->site->employees()->whereHas('user.role', function($query){$query->where('roles.slug','cashier')->orWhere('roles.slug','storekeeper')->orWhere('roles.slug','manager');})->get()->load('user') as $key => $emp) {
                            Notification::ProductAlert($emp->user->id, $sale->site, $prod);
                        }
                    }
                }
            }
            $sale->status = 2;
            $sale->save();

            Action::store('Sale', $sale->id, 'validate',
                "Validation de la commande client SO-".$sale->code
            );

            Notification::validationAlert($sale->site, $sale);

            return response()->json([
                'message' => 'sale validated susscessfully',
                'sale' => new SaleResource($sale->load('validator')),
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
                    $sale->site->products()->findOrFail($prod->id)->pivot->qty += $prod->pivot->qty;
                    $sale->site->products()->findOrFail($prod->id)->pivot->save();
                }
                $sale->save();

                return response()->json([
                    'message' => 'sale validated susscessfully',
                    'sale' => new SaleResource($sale->load('validator')),
                ],200);
            }
        }

        Action::store('Sale', $sale->id, 'invalidate',
            "Invalidation de la commande client SO-".$sale->code
        );

        return response()->json([
            'message' => 'unauthorized',
            'sale' => new SaleResource($sale->load('validator')),
        ],403);
    }

    public function updateSaleStatus(Request $request, Sale $sale){
        if($sale->validator_id == null){
            $sale->status = $request->status;
            $sale->save();

            return response()->json([
                'message' => 'Le statut de la commande a bien été mise à jour',
                'sale' => new SaleResource($sale->load('validator')),
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
        $sale->delete();
        Action::store('Sale', $sale->id, 'destroy',
            "Suppression de la commande client SO-".$sale->code
        );

        return response()->json([
            'message' => 'deleted successfully!',
        ], 200);
    }
}
