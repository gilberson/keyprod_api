<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;
use App\Http\Resources\TrackingCollection;
use App\Http\Resources\TrackingResource;
use App\Models\Tracking;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'tracking' => new TrackingCollection(Tracking::all())
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrackingRequest  $request
     * @return Response
     */
    public function store(StoreTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Tracking $tracking
     * @return JsonResponse
     */
    public function show(Tracking $tracking): JsonResponse
    {
        return response()->json([
            'tracking' => new TrackingResource($tracking)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrackingRequest  $request
     * @param Tracking $tracking
     * @return Response
     */
    public function update(UpdateTrackingRequest $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tracking $tracking
     * @return Response
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
