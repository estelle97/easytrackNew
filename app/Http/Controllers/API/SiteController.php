<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;
use App\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SiteResource::collection(Site::where('is_active', '1')->get()->load('snack','products','suppliers'));
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
     * Store a newly created Store in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String email
     * @param String tel1
     * @param String tel2 [optional]
     * @param String town
     * @param String street
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|required|string|unique:sites',
            'tel1' => 'required|unique:sites',
            'town' => 'required',
            'street' => 'required',
        ]);

        $site = new Site([
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'town' => $request->town,
            'street' => $request->street,
            'snack_id' => 1
        ]);

        $site->save();

        return response()->json([
            'message' => 'Site created successfully!',
            'site' => new SiteResource($site->loadMissing('snack')),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        return new SiteResource($site->loadMissing('snack','products','suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @param String email
     * @param String tel1
     * @param String tel2 [optional]
     * @param String town
     * @param String street
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $request->validate([
            'email' => 'email|required|string',
            'tel1' => 'required',
            'town' => 'required',
            'street' => 'required',
        ]);

        $site->update([
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'town' => $request->town,
            'street' => $request->street,
        ]);

        return response()->json([
            'message' => 'Site updated successfully!',
            'site' => new SiteResource($site->loadMissing('snack')),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
