<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class AdminCompanyController extends Controller {
   
    public function index() {
        $companies=Company::all();
        return view('company.index',['companies'=>$companies]); 
    }

    public function show($company) {
        $company=Company::where('name', $company)->first();
        if ($company) {
        return view('company.show',['company'=>$company]);
        }else {
            return view('error.404');
        }
    }

    public function search(Request $request) {
    $searchQuery = $request->input('company');
    $companies = Company::where('name', 'LIKE', '%' . $searchQuery . '%')->get();
    
    $notFound = $companies->isEmpty();

    return view('company.index', compact('companies', 'notFound', 'searchQuery'));
    }
}
