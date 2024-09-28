<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\product\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('')->middleware('auth::company')->
group(function(){
    Route::get('/all_product', [ProductController::class, 'index']);
    Route::post('/add_product', [ProductController::class, 'store']);
    Route::get('/delete_product', [ProductController::class, 'deletepackage']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
