<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\FilterController;
use App\Models\Company;
use App\Models\Specialization;
use App\Models\Researcher;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;

use App\Http\Controllers\SpecializationController;
use App\Models\Company;
use App\Models\Specialization;
use App\Models\Researcher;



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
Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [LoginController::class, 'show_signup_form'])->name('register');
Route::post('/register', [LoginController::class, 'process_signup']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/500', [DashboardController::class, 'serverError'])->name('500');
Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});


//-----------------------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/send-email', [EmailController::class, 'showEmailForm'])->name('email.form');
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
//-----------------------------------------------------------------------------------------




Route::get('/home/specializations', [SpecializationController::class, 'index'])->name('specializations');
Route::get('/home/specializations/create', [SpecializationController::class, 'create'])->name('specializations.createe');
Route::post('/home/specializations/store', [SpecializationController::class, 'store'])->name('specializations.storee');
Route::get('/home/specializations/{id}/companies', [SpecializationController::class, 'show'])->name('specialization.companies');
Route::get('/home/specializations/{specialization}/edit', [SpecializationController::class, 'edit'])->name('specializations.edite');
Route::put('/home/specializations/{specialization}', [SpecializationController::class, 'update'])->name('specializations.updatee');
Route::resource('specializations', SpecializationController::class);
Route::post('/specializations/restore/{id}', [SpecializationController::class, 'restore'])->name('specializations.restore');

Route::get('/trashed', function () {
    $companies = Company::onlyTrashed()->get();
    $specializations = Specialization::onlyTrashed()->get();
    $researchers = Researcher::onlyTrashed()->get();

    return view('layouts.trashed', compact('companies', 'specializations', 'researchers'));
})->name('trashed.index');

Route::get('/researcher', [FilterController::class, 'index']);
