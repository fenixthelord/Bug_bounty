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

    public function destroy($id) {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('admin.company')->with('success', 'تم حذف الشركة بنجاح');
    }

    public function trashed() {
        $trachedCompany = Company::onlyTrashed()->get();
        return view('company.trashed', ['companies' => $trachedCompany]);
    }

    public function restore($id) {
        $company = Company::withTrashed()->findOrFail($id);
        $company->restore();
        return redirect()->route('admin.company')->with('success', 'تمت الاستعادة بنجاح');
    }  

    public function forceDelete($id) {
        $company = Company::withTrashed()->findOrFail($id);
        $company->forceDelete();

        return redirect()->route('admin.company')->with('success', 'تم حذف الشركة نهائياً بنجاح');
    }
}
