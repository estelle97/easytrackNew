<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products');
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
            'product_id' => 'required',
            'price' => 'required|numeric',
            'cost' => 'required|numeric|min:0',
            'qty' => 'required|numeric|min:1',
            'qty_alert' => 'required|numeric|min:1'
        ]);

        $product = Product::find($request->product_id);

        if($request->site_id == 'all'){
            foreach(Auth::user()->companies->first()->sites as $site){
                if(!$product->sites->contains($site->id)){
                    $product->sites()->attach($site->id, [
                        'price' => $request->price,
                        'cost' => $request->cost,
                        'qty' => $request->qty,
                        'qty_alert' => $request->qty_alert,
                    ]);
                    flashy()->success("Le produit $product->name a été ajouté avec succès au site $site->name");
                } else {
                    flashy()->warning("Le produit $product->name fait déja partir du site $site->name. Veuillez juste le modifier");
                }
            }
        } else {
            if(!$product->sites->contains($request->site_id)){
                $product->sites()->attach($request->site_id, [
                    'price' => $request->price,
                    'cost' => $request->cost,
                    'qty' => $request->qty,
                    'qty_alert' => $request->qty_alert,
                ]);
                flashy()->success('Le produit a été ajouté avec succès');
            } else {
                flashy()->warning("Le produit $product->name fait déja partir du site ".Site::find($request->site_id)->name.". Veuillez juste le modifier");
            }
        }

        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'price' => 'required|numeric',
            'cost' => 'required|numeric|min:0',
            'qty' => 'required|numeric|min:1',
            'qty_alert' => 'required|numeric|min:1'
        ]);

        if($request->site_id == 'all'){
            foreach(Auth::user()->companies->first()->sites as $site){
                $product->sites()->updateExistingPivot($site->id, [
                    'price' => $request->price,
                    'cost' => $request->cost,
                    'qty' => $request->qty,
                    'qty_alert' => $request->qty_alert,
                ]);
            }
        } else {
            $product->sites()->updateExistingPivot($request->site_id, [
                'price' => $request->price,
                'cost' => $request->cost,
                'qty' => $request->qty,
                'qty_alert' => $request->qty_alert,
            ]);
        }

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
