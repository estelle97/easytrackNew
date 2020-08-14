<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
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
        return view('superAdmin.products');
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
            'name' => 'required|unique:products',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

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
            $path = 'template/assets/static/users/'.\App\Activity::find(1)->name.'/'.\App\Category::find($request->category_id)->name.'/';
            $fileName = $product->name.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $product->photo = $name;
        }

        $product->save();
        $product->activities()->attach(1);

        return 'success';
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
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,'.$product->id.'',
        ]);

        $product->update([
            'name' => $request->name,
            'code' => uniqid(),
            'description' => $request->description,
            'brand' => $request->brand,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
        ]);

        dump($request->all());
        $photo = $request->file('photo');
        if($photo){
            $path = 'template/assets/static/users/'.\App\Activity::find(1)->name.'/'.\App\Category::find($request->category_id)->name.'/';
            $fileName = $product->name.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $product->photo = $name;
            $product->save();
        }
        dd($product);
        

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
