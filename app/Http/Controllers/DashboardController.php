<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\Report;
use App\Models\Researcher;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Company $company)
    {
        $companies = Company::all()->count();

        $products = Product::all()->count();

        $researchers = Researcher::all()->count();

        $reports = Report::all()->count();
        $pending = Report::all()->where('status', '=', 'pending')->count();
        $accept = Report::all()->where('status', '=', 'accept')->count();
        $reject = Report::all()->where('status',  '=', 'reject')->count();
        $done = Report::all()->where('status',  '=', 'done')->count();


        return view(
            'panel.dashboard.index',
            compact('companies', 'products',  'researchers', 'reports', 'pending', 'accept', 'reject', 'done')
        );
    }

    public function notFound()
    {
        return view('error.404');
    }

    public function serverError()
    {
        return view('error.500');
    }
}
