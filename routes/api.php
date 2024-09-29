<?php

use App\Http\Controllers\Api\Researcher\Auth\ChangePasswordController as ResearcherChangePasswordController;
use App\Http\Controllers\Api\Researcher\Auth\ForgetPasswordController as ResearcherForgetPasswordController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\api\company\CompanyLoginController;
use App\Http\Controllers\api\company\CompanyRegisterController;
use App\Http\Controllers\api\researcher\ResearcherLoginController;
use App\Http\Controllers\api\researcher\ResearcherRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReportController;




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

Route::prefix('')->middleware('auth::company')->group(function() {
    Route::get('/all_report', [ReportController::class, 'ReportByCompany']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
Route::prefix('')->middleware('auth::company')->
group(function(){
    Route::get('/all_product', [ProductController::class, 'index']);
    Route::post('/add_product', [ProductController::class, 'store']);
    Route::get('/delete_product', [ProductController::class, 'deletepackage']);
});




Route::group(['prefix' => 'company' ,'middleware'=>['auth:company']], function (){
    Route::get('/show' , [CompanyController::class , 'index']);
    Route::get('/show/{id}', [CompanyController::class , 'show']);
    Route::post('/update/{id}' ,[CompanyController::class , 'update']);
});



/*
    ****************************************
 ************* Researcher Route *****************
    ****************************************
 */

Route::prefix('researcher')->group(function () {

    # forget Password
    Route::post('/forgetPassword', [ResearcherForgetPasswordController::class, 'GenerateOTP']);
    Route::post('/validateOtp', [ResearcherForgetPasswordController::class, 'ValidateOtp']);
    Route::post('/resetPassword', [ResearcherForgetPasswordController::class, 'ResetPassword']);

    Route::middleware('auth:researcher')->group(function () {
        
        Route::post('/changePassword', [ResearcherChangePasswordController::class, 'ChangePassword']);
    });

});

Route::post('/researcherregister', [ResearcherRegisterController::class, 'store']);
Route::post('/researcherregister/{uuid}', [ResearcherRegisterController::class,'registerCode']);
Route::post('/researcherlogin',[ResearcherLoginController::class,'login']);
Route::post('/researcherlogout',[ResearcherLoginController::class,'logout'])->middleware('auth:sanctum');

Route::post('/companyregister', [CompanyRegisterController::class, 'store']);
Route::post('/companylogin',[CompanyLoginController::class,'login']);
Route::post('/companylogout',[CompanyLoginController::class,'logout'])->middleware('auth:sanctum');
