<?php

namespace App\Http\Controllers\Api\Researcher;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource\CompanyResource;
use App\Http\Resources\ResearcherResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Company;
use App\Models\Product;
use App\Models\Researcher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ResearcherController extends Controller
{
    use GeneralTrait;

    public function searchCompany(Request $request)
    {
        try {

            $query = Company::query();

            if ($request->has('name')) {
                $query->where('name',  'LIKE', '%' . $request->input('name') . '%');
            }

            if ($request->has('unavailability')) {
                $query->onlyTrashed();
            }

            if ($request->has('old')) {
                $query->orderBy('created_at', 'asc');
            }
            if ($request->has('new')) {
                $query->orderBy('created_at', 'desc');
            }

            $companies = CompanyResource::collection($query->get());
            $data['companies'] = $companies;
            return $this->SuccessResponse($data);
        } catch (\Exception $e) {
            $this->handleException($e);
            // Handle the exception and return an error response
        }
    }
    public function editresearsher()
    {
        $user = auth('researcher')->user();

        $data['researcher'] = new ResearcherResource($user);
        return $this->apiResponse($data, 1, null, 200);
    }

    public function updateprofile(Request $request)
    {
        $researcher = auth()->user();

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            //'uuid'=>'nullable',
            'email' =>  [
                'required',
                'email',
                Rule::unique('researchers', 'email')->ignore($researcher->id),
            ],

            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'code' => 'nullable|string',
            'phone' => 'nullable|string',

        ]);


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public'); //هون عم خزن الصور بالمجلد
            $validateData['image'] = $path; //هون عم اكتب مسار الصورة كامل مشان الفرونت يقدرو يشوفوها
        }
        //return response(($validateData)) ; }}
        //التحديث
        $researcher->update([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'description' => $validateData['description'] ?? $researcher->description,
            'image' => $validateData['image'] ?? $researcher->image,
            'code' => $validateData['code'] ?? $researcher->code,
            'phone' => $validateData['phone'] ?? $researcher->phone,


        ]);
        $data['researcher'] = new ResearcherResource($researcher);
        return $this->apiResponse( $data , true, 'تم تحديث معلومات الباحث بنجاح', 200);
    }


    public function company ($uuid) {
        $company = Company::where('uuid', $uuid)->first();
        if ($company) {
            $data['company-data'] = new CompanyResource($company);
            $data['companies_suggest'] = CompanyResource::collection(Company::inRandomOrder()->limit(8)->get());

            return $this->apiResponse($data, 1, null, 200);
        } else {
            return $this->apiResponse(null, 0, 'Company not found', 404);
        }
    }
}
