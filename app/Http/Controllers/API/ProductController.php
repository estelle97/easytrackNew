<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
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
        return ProductResource::collection(Product::where('is_active','1')->get()->load('category','sites'));
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
            'name' => 'required|string|unique:products',
            'brand' => 'required',
        ]);

        $code = trim($request->name);
        $product = Product::create([
            'name' => $request->name,
            'code' => $code,
            'brand' => $request->brand,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        $product->save();

        return response()->json([
            'message' => 'Product created successfully!',
            'product' => new ProductResource($product->loadMissing('category'))
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product->loadMissing('category','sites'));
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
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'brand' => 'required',
        ]);

        $code = trim($request->name);
        $product->update([
            'name' => $request->name,
            'code' => $code,
            'brand' => $request->brand,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        $product->save();

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => new ProductResource($product->loadMissing('category'))
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
