<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResearcherController; 
use App\Http\Controllers\CompanyController;  


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

\Illuminate\Support\Facades\Auth::routes(['register' => false]);


// Custom Auth
Route::get('/login',[LoginController::class,'show_login_form'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::get('/register',[LoginController::class,'show_signup_form'])->name('register');
Route::post('/register',[LoginController::class,'process_signup']);

Route::post('/logout',[LoginController::class,'logout'])->name('logout');



//Auth::routes();

Route::get('/test', [DashboardController::class, 'index'])->name('Admin-Panel');
Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/500', [DashboardController::class, 'serverError'])->name('404');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');  
Route::get('/reports/pending', [ReportController::class, 'showPendingReports'])->name('reports.pending');  
Route::post('/reports/{reportUuid}/update-status', [ReportController::class, 'updateStatus'])->name('reports.update-status');  
Route::get('/researchers', [ResearcherController::class, 'index'])->name('researchers.index');  
Route::get('/researchers/{researcher}/reports', [ResearcherController::class, 'showReports'])->name('researchers.reports');  
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');  
