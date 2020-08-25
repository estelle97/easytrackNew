<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superAdmin.products.products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = '';
        $units = '';
        foreach(\App\Category::all() as $cat){
            $categories .= "<option value=$cat->id> $cat->name </option>";
        }
        foreach(\App\Unit::all() as $unit){
            $units .= "<option value=$unit->id> $unit->name </option>";
        }

        return view('superAdmin.products.create_products', compact('categories', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

        $product = new Product([
            'name' => $request->name,
            'code' => uniqid(),
            'description' => $request->description,
            'brand' => $request->brand,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
        ]);

        
        $photo = $request->file('photo');
        if($photo){
            $path = 'template/assets/static/products/'.\App\Activity::find(1)->name.'/'.\App\Category::find($request->category_id)->name.'/';
            $fileName = $product->name.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $product->photo = $name;
        }

        $product->save();
        $product->activities()->attach(1);

        return 'success';
    }

    public function storeManyProducts(Request $request){
        
        $products = explode('|', rtrim($request->products,'|'));
        foreach($products as $key => $prods){
            $request->validate([
                'photo'.$key => 'required|image|mimes:png|max:1024'
                ]);
            }
            
        foreach($products as $key => $prods){
            $prod = explode(';', $prods);
            $product = new Product([
                'name' => $prod[0],
                'code' => uniqid(),
                'brand' => $prod[1],
                'category_id' => $prod[2],
                'unit_id' => $prod[3],
                'description' => $prod[4]
            ]);
            $photo =$request->file('photo'.$key);

            $path = 'template/assets/static/products/'.\App\Activity::find(1)->name.'/'.\App\Category::find($prod[2])->name.'/';
            $fileName = $product->name.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $product->photo = $name;

            $product->save();
            $product->activities()->attach(1);

        }
        flashy()->success('Les produits ont été ajoutés avec succès');

        return response()->json([
            'message' => 'Les produits ont été ajoutes avec succès',
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        $product->update([
            'name' => $request->name,
            'code' => uniqid(),
            'description' => $request->description,
            'brand' => $request->brand,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
        ]);

        $photo = $request->file('photo');
        if($photo){
            $path = 'template/assets/static/products/'.\App\Activity::find(1)->name.'/'.\App\Category::find($request->category_id)->name.'/';
            $fileName = $product->name.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $product->photo = $name;
            $product->save();
        }
        

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        if($product->delete()) {
            return response()->json([
                'message' => 'Le produit a bien été supprimé'
            ], 200);
        }
    }
}
