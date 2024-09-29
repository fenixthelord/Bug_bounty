<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Specialization;
use App\Models\Product;
use App\Models\Report;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comapnies=Company::all();

        return view('company.index',['comapnies'=>$comapnies]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($company)
    {
        $company=Company::where('name',$company)->first();
        if($company){
        return view('company.show',['company'=>$company]);
        }else{
            return view('error.404');
        }
    }

    public function search(Request $request)
    {
        $company=Company::where('name',$request->company)->first();
        if($company){
        return view('company.show',['company'=>$company]);
        }else{
            return view('error.404');
        }
    }










    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
