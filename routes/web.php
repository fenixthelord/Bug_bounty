<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

//Route::get('/register',[LoginController::class,'show_signup_form'])->name('register');
//Route::post('/register',[LoginController::class,'process_signup']);

Route::post('/logout',[LoginController::class,'logout'])->name('logout');



//Auth::routes();

Route::get('/test', [DashboardController::class, 'index'])->name('Admin-Panel');
Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/500', [DashboardController::class, 'serverError'])->name('500');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/researcher/delete/{uuid}', [App\Http\Controllers\ResearcherController::class, 'destroy'])->name('destroy.researcher');
Route::get('/researcher/restore/{uuid}', [App\Http\Controllers\ResearcherController::class, 'restore'])->name('restore.researcher');
Route::get('/researcher/trashed', [App\Http\Controllers\ResearcherController::class, 'trashed'])->name('trashed.researcher');
Route::get('/researcher/show', [App\Http\Controllers\ResearcherController::class, 'index'])->name('index.researcher');
Route::get('/researcher/edit/{uuid}', [App\Http\Controllers\ResearcherController::class, 'edit'])->name('edit.researcher');
Route::post('/researcher/update/{uuid}', [App\Http\Controllers\ResearcherController::class, 'update'])->name('update.researcher');

