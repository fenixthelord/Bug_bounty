<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Specialization;
use App\Models\Product;
use App\Models\Report;

class CompanyController extends Controller {
   public function index() {
        $companies=Company::all();

        return view('company.index',['companies'=>$companies]); 
    }

    public function show($company) {
        $company=Company::where('name',$company)->first();
        if($company) {
        return view('company.show',['company'=>$company]);
        }else {
            return view('error.404');
        }
    }

    public function search(Request $request) {
        $query = $request->input('company');
        $companies = Company::where('name', 'like', '%' . $query . '%')->get();

        return view('company.index', [
            'companies' => $companies,
            'searchQuery' => $query,
            'notFound' => $companies->isEmpty()
        ]);
    }
}
