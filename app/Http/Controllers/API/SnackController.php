<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SnackResource;
use App\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SnackResource::collection(Snack::where('is_active', '1')->get()->load('sites','types'));
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
     * Store a newly created Snack in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String name
     * @param String email
     * @param String tel1
     * @param String tel2 [optional]
     * @param String town
     * @param String steet
     * @param File logo [optional]
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:snacks',
            'email' => 'email|required|string|unique:snacks',
            'tel1' => 'required|unique:snacks',
            'town' => 'required',
            'street' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $snack = new Snack([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'town' => $request->town,
            'street' => $request->street,
        ]);

        $snack->save();

        return response()->json([
            'message' => 'Snack created successfully',
            'snack' => new SnackResource($snack),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function show(Snack $snack)
    {
        return new SnackResource($snack->loadMissing('user','sites.users','sites.suppliers','types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function edit(Snack $snack)
    {
        //
    }

    /**
     * Update the specified Snack in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Snack  $snack
     * @param String name
     * @param String email
     * @param String tel1
     * @param String tel2 [optional]
     * @param String town
     * @param String steet
     * @param File logo [optional]
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snack $snack)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|string',
            'tel1' => 'required',
            'town' => 'required',
            'street' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $snack->update([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'town' => $request->town,
            'street' => $request->street,
        ]);

        return response()->json([
            'message' => 'Snack updated successfully',
            'snack' => new SnackResource($snack),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snack $snack)
    {
        //
    }
}
