<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrackingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('packages/{package}/items', [PackageController::class, 'getPackageItems'])->name('packages.items');
Route::get('packages/{package}/tracking', [PackageController::class, 'getTracking'])->name('packages.tracking');
Route::put('packages/{package}/add-products', [PackageController::class, 'addProductsToPackage'])->name('packages.add-products');
Route::put('packages/{package}/remove-products', [PackageController::class, 'removeProductsFromPackage'])->name('packages.remove-products');
Route::post('packages/{package}/tracking/create', [PackageController::class, 'createTracking'])->name('packages.tracking.create');

Route::apiResources([
    'categories' => CategoryController::class,
    'orders' => OrderController::class,
    'products' => ProductController::class,
    'packages' => PackageController::class,
    'tracking' => TrackingController::class,
]);


