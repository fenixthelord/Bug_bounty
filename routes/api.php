<?php

use App\Http\Controllers\Api\Company\Auth\ChangePasswordController as CompanyChangePasswordController;
use App\Http\Controllers\Api\Researcher\Auth\ChangePasswordController as ResearcherChangePasswordController;
use App\Http\Controllers\Api\Researcher\Auth\ForgetPasswordController as ResearcherForgetPasswordController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\api\company\CompanyLoginController;
use App\Http\Controllers\api\company\CompanyRegisterController;
use App\Http\Controllers\api\researcher\ResearcherLoginController;
use App\Http\Controllers\api\researcher\ResearcherRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\product\ProductController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\Researcher\ResearcherController;

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


/*
    ****************************************
 ************* Authentication Routes *****************
    ****************************************
*/

Route::middleware('guest:company')->group(function () {
    Route::post('/companylogin', [CompanyLoginController::class, 'login']);
    Route::post('/companyregister', [CompanyRegisterController::class, 'store']);
});
Route::post('/companylogout', [CompanyLoginController::class, 'logout'])->middleware('auth:company');


Route::middleware('guest:researcher')->group(function () {
    Route::post('/researcherregister', [ResearcherRegisterController::class, 'store']);
    Route::post('/researcherregister/{uuid}', [ResearcherRegisterController::class, 'registerCode']);
    Route::post('/researcherlogin', [ResearcherLoginController::class, 'login']);
});
Route::post('/researcherlogout', [ResearcherLoginController::class, 'logout'])->middleware('auth:sanctum');



/*
    ****************************************
 ************* Company Routes *****************
    ****************************************
*/

Route::group(['prefix' => 'company', 'middleware' => ['auth:company']], function () {
    # Products
    Route::get('/all_product', [ProductController::class, 'index']);
    Route::post('/add_product', [ProductController::class, 'store']);
    Route::post('/delete_product', [ProductController::class, 'deletepackage']);

    # Home
    Route::get('/home', [CompanyController::class, 'index']);
    Route::get('/show', [CompanyController::class, 'show']);
    Route::post('/update', [CompanyController::class, 'update']);

    # Reports
    Route::get('/all_report', [ReportController::class, 'ReportByCompany']);

    # Change Password
    Route::post('/changePassword', [CompanyChangePasswordController::class, 'ChangePassword']);

});



/*
    ****************************************
 ************* Researcher Routes *****************
    ****************************************
 */

Route::prefix('researcher')->group(function () {

    # forget Password
    Route::post('/forgetPassword', [ResearcherForgetPasswordController::class, 'GenerateOTP']);
    Route::post('/validateOtp', [ResearcherForgetPasswordController::class, 'ValidateOtp']);
    Route::post('/resetPassword', [ResearcherForgetPasswordController::class, 'ResetPassword']);

    Route::middleware('auth:researcher')->group(function () {
        Route::post('/changePassword', [ResearcherChangePasswordController::class, 'ChangePassword']);

        # Reports
        Route::get('/reports-researcher', [ReportController::class, 'ReportByResearcher']);
        Route::get('/add-reports-researcher', [ReportController::class, 'showAll']);
        Route::post('/add-reports-researcher', [ReportController::class, 'addreport']);

        Route::post('/show/{uuid}', [ResearcherController::class, 'editresearsher']);
        Route::post('/update/{uuid}', [ResearcherController::class, 'updateprofile']);
        Route::get('/searchCompany', [ResearcherController::class, 'searchCompany']);
    });
});
