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
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ResearcherController;
use App\Http\Controllers\ReportController;
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

// Custom Auth Routes
Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Error Pages Routes
Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/500', [DashboardController::class, 'serverError'])->name('500');

// Home Route
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });

// Researcher Routes
Route::middleware('auth')->group(function () {

Route::get('/researcher/show', [ResearcherController::class, 'index'])->name('show.researcher');
Route::get('/researcher/edit/{uuid}', [ResearcherController::class, 'edit'])->name('edit.researcher');
Route::post('/researcher/update/{uuid}', [ResearcherController::class, 'update'])->name('update.researcher');
Route::get('/researcher/delete/{uuid}', [ResearcherController::class, 'destroy'])->name('delete.researcher');
Route::get('/researcher/restore/{uuid}', [ResearcherController::class, 'restore'])->name('restore.researcher');
Route::get('/researcher/trashed', [ResearcherController::class, 'trashed'])->name('trashed.researcher');
});

// Admin Routes auth
Route::middleware('auth')->group(function () {
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// Email Routes
Route::middleware('auth')->group(function () {

Route::get('/send-email', [EmailController::class, 'showEmailForm'])->name('email.form');
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
});

// Specializations Routes auth
Route::middleware('auth')->group(function () {
    Route::get('/home/specializations', [SpecializationController::class, 'index'])->name('specializations');
    Route::get('/home/specializations/create', [SpecializationController::class, 'create'])->name('specializations.create');
    Route::post('/home/specializations/store', [SpecializationController::class, 'store'])->name('specializations.store');
    Route::get('/home/specializations/{specialization}/companies', [SpecializationController::class, 'show'])->name('specialization.companies');
    Route::get('/home/specializations/{specialization}/edit', [SpecializationController::class, 'edit'])->name('specializations.edit');
    Route::put('/home/specializations/{specialization}', [SpecializationController::class, 'update'])->name('specializations.update');
    
    Route::delete('/home/specializations/{specialization}', [SpecializationController::class, 'destroy'])->name('specializations.destroy');
    Route::get('/home/specializations/trashed', [SpecializationController::class, 'trashed'])->name('specializations.trashed');
    Route::patch('/home/specializations/{specialization}/restore', [SpecializationController::class, 'restore'])->name('specializations.restore');
    Route::delete('/home/specializations/{specialization}/force-delete', [SpecializationController::class, 'forceDelete'])->name('specializations.forceDelete');
});

// Trashed Items Route
Route::get('/trashed', function () {
    $companies = Company::onlyTrashed()->get();
    $specializations = Specialization::onlyTrashed()->get();
    $researchers = Researcher::onlyTrashed()->get();

    return view('layouts.trashed', compact('companies', 'specializations', 'researchers'));
})->name('trashed.index');

// HomePage Routes
Route::middleware('auth')->group(function () {

Route::get('/', [HomePageController::class, 'index']);
Route::get('/home', [HomePageController::class, 'index'])->name('homepage');
Route::post('/homepagefunc', [HomePageController::class, 'filter'])->name('homepage-validate');
});

// Admin Company Routes auth
Route::prefix('/admin')->middleware('auth')->group(function() {
    Route::get('/company', [AdminCompanyController::class, 'index'])->name('admin.company');
    Route::get('/company/show/{company}', [AdminCompanyController::class, 'show'])->name('admin.company.show');
    Route::get('/company/search', [AdminCompanyController::class, 'search'])->name('admin.company.search');
});

// Report Routes
Route::get('/reports', [ReportController::class, 'index'])
->name('reports.index');  
Route::get('/researcher/{researcherUuid}/reports', [ReportController::class, 'showResearcherReports'])->name('researcher.reports');  
Route::get('/reports/pending', [ReportController::class, 'showPendingReports'])
->name('reports.pending');  
Route::post('/reports/{reportUuid}/update-status', [ReportController::class, 'updateStatus'])
->name('reports.update-status');  

// Researcher Report Route
Route::get('/researchers', [ResearcherController::class, 'researcherReport'])
->name('reports.researcherreport');