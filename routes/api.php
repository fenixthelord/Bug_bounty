<?php

use App\Http\Controllers\Api\Researcher\Auth\ChangePasswordController as ResearcherChangePasswordController;
use App\Http\Controllers\Api\Researcher\Auth\ForgetPasswordController as ResearcherForgetPasswordController;
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
 ************* Researcher Route *****************
    ****************************************
 */

Route::prefix('researcher')->group(function () {

    # forget Password 
    Route::post('/forgetPassword', [ResearcherForgetPasswordController::class, 'GenerateOTP']);
    Route::post('/validateOtp', [ResearcherForgetPasswordController::class, 'ValidateOtp']);

    Route::middleware('auth:researcher')->group(function () {
        # Reset Password
        Route::post('/resetPassword', [ResearcherForgetPasswordController::class, 'ResetPassword']);
        # Change Password 
        Route::post('/changePassword', [ResearcherChangePasswordController::class, 'ChangePassword']);
    });
});
