<?php

use Illuminate\Http\Request;

use App\Http\Controllers\api\company\CompanyLoginController;
use App\Http\Controllers\api\company\CompanyRegisterController;
use App\Http\Controllers\api\researcher\ResearcherLoginController;
use App\Http\Controllers\api\researcher\ResearcherRegisterController;
use Illuminate\Support\Facades\Route;


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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('/researcherregister', [ResearcherRegisterController::class, 'store']);
Route::post('/researcherregister/{uuid}', [ResearcherRegisterController::class,'registerCode']);
Route::post('/researcherlogin',[ResearcherLoginController::class,'login']);
Route::post('/researcherlogout',[ResearcherLoginController::class,'logout'])->middleware('auth:sanctum');

Route::post('/companyregister', [CompanyRegisterController::class, 'store']);
Route::post('/companylogin',[CompanyLoginController::class,'login']);
Route::post('/companylogout',[CompanyLoginController::class,'logout'])->middleware('auth:sanctum');
