<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;
use App\Models\Tracking;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrackingRequest  $request
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackingRequest $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
