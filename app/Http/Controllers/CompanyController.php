<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;  


class CompanyController extends Controller
{
    public function index()  
    {  
        // Eager load products with companies  
        $companies = Company::with('products')->get();  

        return view('companies.index', compact('companies'));  
    }  
}
