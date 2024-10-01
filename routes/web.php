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
use App\Http\Controllers\AdminCompanyController;

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

Route::get('/register',[LoginController::class,'show_signup_form'])->name('register');
Route::post('/register',[LoginController::class,'process_signup']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/500', [DashboardController::class, 'serverError'])->name('404');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/researcher/show', [App\Http\Controllers\ResearcherController::class, 'index'])->name('show.researcher');
Route::get('/researcher/edit/{uuid}', [App\Http\Controllers\ResearcherController::class, 'edit'])->name('edit.researcher');
Route::post('/researcher/update/{uuid}', [App\Http\Controllers\ResearcherController::class, 'update'])->name('update.researcher');
Route::get('/researcher/delete/{uuid}', [App\Http\Controllers\ResearcherController::class, 'destroy'])->name('delete.researcher');
Route::get('/researcher/restore/{uuid}', [App\Http\Controllers\ResearcherController::class, 'restore'])->name('restore.researcher');
Route::get('/researcher/trashed', [App\Http\Controllers\ResearcherController::class, 'trashed'])->name('trashed.researcher');


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
Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/company',[AdminCompanyController::class,'index'])->name('admin.company');
    Route::get('/company/show/{company}',[AdminCompanyController::class,'show'])->name('admin.company.show');
    Route::get('/company/search',[AdminCompanyController::class,'search'])->name('admin.company.search');
    });
Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');
Route::post('/homepagefunc', [HomepageController::class, 'filter'])->name('homepage-validate');

