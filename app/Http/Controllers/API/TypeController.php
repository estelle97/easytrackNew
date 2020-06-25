<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TypeResource;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TypeResource::collection(Type::all()->load('snacks'));
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
            'title' => 'required|string|unique:types',
            'duration' => 'required',
            'price' => 'required',
        ]);

        $type = new Type([
            'title' => $request->title,
            'duration' => $request->duration,
            'price' => $request->price
        ]);
        $type->save();

        return response()->json([
            'message' => 'Type added successfully!',
            'type' => new TypeResource($type)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return new TypeResource($type->loadMissing('snacks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required',
            'price' => 'required',
        ]);

        $type->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'Type updated successfully!',
            'type' => new TypeResource($type)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
}
