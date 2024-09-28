<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Traits\GeneralTrait;
use App\Http\Resources\CompanyResource\CompanyResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
 use GeneralTrait;

 public function index(Request $request)
    {
       
    $query = Company::query();

    if ($request->has('search') && !empty($request->input('search'))) {
        $searchName = $request->input('search');
        $query->where('name', 'like', '%' . $searchName . '%');
    }

    // الحصول على نتائج الاستعلام سواء كانت مفلترة أو جميع الشركات
    $companies = $query->get();

   return $this->apiResponse(CompanyResource::collection($companies), true, null, 200);

        
    }

public function show($id){
  $companies = Company::find($id);
  
   if (!$companies){
    return $this->notFoundResponse('هذه الشركة غير موجودة ',);
   }
    return $this->apiResponse(new CompanyResource($companies), true ,null, 200);
   
}
 


public function update($id , Request $request){
    $companies = company::find($id);

    $validateData = $request ->validate([
        'name'=> 'required|string|max:255',
        'email'=> [
            'required',
            'email',
            'max:255',
            Rule::unique('companies')->ignore($companies->id),
        ],
        'type' => 'required|string|max:255',
        'description' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'domain' => 'nullable|string|max:255',
        'employess_count' => 'required|integer|min:1',
    ]);
    
  //   if (!Storage::exists('public/logos')) {
  //     Storage::makeDirectory('public/logos');
  // }
    if($request->hasFile('logo')) {
        $path = $request->file('logo')->store('logos', 'public'); //هون عم خزن الصور بالمجلد 
        $validateData['logo'] =$path ; //هون عم اكتب مسار الصورة كامل مشان الفرونت يقدرو يشوفوها
    }
    //التحديث
    $companies -> update([
        'name' => $validateData['name'],
        'email' => $validateData['email'],
        'type' => $validateData['type'],
        'description' => $validateData['description'] ?? $companies->description, 
        'logo' => $validateData['logo'] ?? $companies->logo,
        'domain' => $validateData['domain'] ?? $companies->domain,
        'employess_count' => $validateData['employess_count'],

    ]);
    return $this->apiResponse(new CompanyResource($companies), true, 'تم تحديث الشركة بنجاح', 200);
}

}
