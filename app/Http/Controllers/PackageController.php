<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\PackageResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\TrackingResource;
use App\Models\Package;
use App\Models\Product;
use App\Models\Tracking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'packages' => Package::all()
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StorePackageRequest $request
     * @return JsonResponse
     */
    public function store(StorePackageRequest $request): JsonResponse
    {
        $package = Package::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'package_reference' => Str::random(12),
        ]);

        return response()->json([
            'package' => $package
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return JsonResponse
     */
    public function show(Package $package): JsonResponse
    {
        return response()->json([
            'package' => new PackageResource($package),
            'products' => new ProductCollection(Product::where('package_id', null)->get()),
            'packageItems' => new ProductCollection($package->products()->get())
        ], 200);
    }

    /**
     * @param Package $package
     * @return JsonResponse
     */
    public function getPackageItems(Package $package): JsonResponse
    {
        return response()->json([
            'packageItems' => new ProductCollection($package->products()->get())
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param Package $package
     * @return Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return Response
     */
    public function destroy(Package $package)
    {
        //
    }

    /**
     * @param Request $request
     * @param Package $package
     * @return JsonResponse
     */
    public function addProductsToPackage(Request $request, Package $package): JsonResponse
    {
        foreach ($request->get('products') as $product)
        {
            $product = Product::find((int)$product['id']);
            $product->package_id = $package->id;
            $product->save();
        }

        return response()->json([
            'message' => 'Products added to the package successfully',
            'package' => $package->products()->get()
        ], 200);
    }

    /**
     * @param Request $request
     * @param Package $package
     * @return JsonResponse
     */
    public function removeProductsFromPackage(Request $request, Package $package): JsonResponse
    {
        foreach ($request->get('products') as $product)
        {
            $product = Product::find((int)$product['id']);
            $product->package_id = null;
            $product->save();
        }

        return response()->json([
            'message' => 'Products removed from the package successfully',
            'package' => $package->products()->get()
        ], 200);
    }

    /**
     * @param Package $package
     * @return JsonResponse
     */
    public function getTracking(Package $package): JsonResponse
    {
        if($package->tracking()->first() === null)
        {
            return response()->json([
                'tracking' => null
            ], 200);
        }
        return response()->json([
            'tracking' => new TrackingResource($package->tracking()->first())
        ], 200);
    }

    public function createTracking(Request $request, Package $package): JsonResponse
    {
        $tracking = Tracking::create([
            'tracking_number' => $request->get('tracking_number'),
            'description' => $request->get('description'),
            'package_id' => $package->id
        ]);

        return response()->json([
            'tracking' => $tracking
        ], 201);
    }
}
