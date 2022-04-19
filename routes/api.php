<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
//Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::apiResources([
    'categories' => CategoryController::class,
    'orders' => OrderController::class,
    'products' => ProductController::class,
]);


