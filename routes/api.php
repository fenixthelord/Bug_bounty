<?php

use App\Http\Controllers\Api\Company\Auth\CompanyLoginController;
use App\Http\Controllers\Api\Company\Auth\CompanyRegisterController;
use App\Http\Controllers\Api\Company\ChangePasswordController as CompanyChangePasswordController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Report\ReportController;
use App\Http\Controllers\Api\Researcher\Auth\ForgetPasswordController;
use App\Http\Controllers\Api\Researcher\Auth\ResearcherLoginController;
use App\Http\Controllers\Api\Researcher\Auth\ResearcherRegisterController;
use App\Http\Controllers\Api\Researcher\ChangePasswordController as ResearcherChangePasswordController;
use App\Http\Controllers\Api\Researcher\ResearcherController;
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


/*
    ****************************************
 ************* Authentication Routes *****************
    ****************************************
*/

Route::post('/companylogin', [CompanyLoginController::class, 'login']);
Route::post('/researcherlogin', [ResearcherLoginController::class, 'login']);


Route::post('/companyregister', [CompanyRegisterController::class, 'store']);
Route::post('/researcherregister', [ResearcherRegisterController::class, 'store']);
Route::post('/researcherregister/{uuid}', [ResearcherRegisterController::class, 'registerCode']);



/*
    ****************************************
 ************* Company Routes *****************
    ****************************************
*/

Route::group(['prefix' => 'company', 'middleware' => ['auth_company']], function () {
    # Products
    Route::get('/all_product', [ProductController::class, 'index']);
    Route::post('/add_product', [ProductController::class, 'store']);
    Route::post('/delete_product', [ProductController::class, 'deletepackage']);

    # Home
    Route::get('/home', [CompanyController::class, 'index']);

    # Profile
    Route::get('/show', [CompanyController::class, 'show']);
    Route::post('/update', [CompanyController::class, 'update']);

    # Reports
    Route::get('/all_report', [ReportController::class, 'ReportByCompany']);

    # Change Password
    Route::post('/changePassword', [CompanyChangePasswordController::class, 'ChangePassword']);

    # Logout
    Route::post('/companylogout', [CompanyLoginController::class, 'logout']);
});



/*
    ****************************************
 ************* Researcher Routes *****************
    ****************************************
 */


Route::prefix('researcher')->group(function () {

    # forget Password
    Route::post('/forgetPassword', [ForgetPasswordController::class, 'GenerateOTP']);
    Route::post('/validateOtp', [ForgetPasswordController::class, 'ValidateOtp']);
    Route::post('/resetPassword', [ForgetPasswordController::class, 'ResetPassword']);

    Route::middleware('auth_researcher')->group(function () {
        Route::post('/changePassword', [ResearcherChangePasswordController::class, 'ChangePassword']);

        # Reports
        Route::get('/reports-researcher', [ReportController::class, 'ReportByResearcher']);
        // Route::get('/add-reports-researcher', [ReportController::class, 'showAll']);
        Route::post('/add-reports-researcher', [ReportController::class, 'addreport']);

        Route::get('/company/{uuid}', [ResearcherController::class, 'company']);

        Route::get('/show', [ResearcherController::class, 'editresearsher']);
        Route::post('/update', [ResearcherController::class, 'updateprofile']);
        Route::get('/searchCompany', [ResearcherController::class, 'searchCompany']);

        Route::post('/researcherlogout', [ResearcherLoginController::class, 'logout']);
    });
});
