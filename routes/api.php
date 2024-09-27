<?php

use App\Http\Controllers\Api\Researcher\Auth\ChangePasswordController as ResearcherChangePasswordController;
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

Route::group(['prefix' => 'researcher', 'middleware' => ['auth:researcher']], function () {
   # Change Password 
   Route::post('/change-password', [ResearcherChangePasswordController::class, 'changePassword']);
});
