<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\HeadingPermalink\Slug\DefaultSlugGenerator;
use League\CommonMark\Normalizer\SlugNormalizer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 2){
            $products = Auth::user()->companies->first()->sites->load('products.category');
        } else {
            $products = Auth::user()->employee->site->products->load('category');
        }

        return response()->json([
            'products' => $products
        ]);
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
     * Create a new product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String name
     * @param String brand
     * @param String description [Optional]
     * @param Integer category_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:products',
            'brand' => 'required',
        ]);

        $code = str_replace(' ','-',$request->name);
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
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @param String name
     * @param String brand
     * @param String description [Optional]
     * @param Integer category_id
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'brand' => 'required',
            'category_id' => 'required',
        ]);

        $code = str_replace(' ','-',$request->name);
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
