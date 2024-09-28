<?php

use App\Http\Controllers\Api\Researcher\Auth\ChangePasswordController as ResearcherChangePasswordController;
use App\Http\Controllers\Api\Researcher\Auth\ForgetPasswordController as ResearcherForgetPasswordController;
use Illuminate\Support\Facades\Route;

use App\Model\Company;
use App\Http\Controllers\Api\CompanyController;
use  App\Http\Controllers\ReportController;
use App\Http\Controllers\researcher\ResearcherController;

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
        # Change Password
        Route::post('/changePassword', [ResearcherChangePasswordController::class, 'ChangePassword']);
        Route::get('/searchCompany', [ResearcherController::class, 'searchCompany']);
    });
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



///////edit data researsher////

Route::post('/editreshearsher/{id}', [ResearcherController::class, 'editresearsher']);
