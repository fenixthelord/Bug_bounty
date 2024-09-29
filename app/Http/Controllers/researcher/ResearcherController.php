<?php

namespace App\Http\Controllers\researcher;

use App\Http\Controllers\Controller;
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
    public function searchCompany( Request $request)
    {
        try {
      if ($request->name==null and $request->avaibility==null && $request->new==null )
      {
        return $this->apiResponse (Company::all(),1,null,200);
      }

    $query = Company::query();

      if ($request->has('name')) {
          $query->where( 'name',  'LIKE', '%' . $request->input('name') . '%');
      }

      if ($request->has('unavailability')) {
          $query->withTrashed();
      }

      if ($request->has('old')) {
          $query->orderBy('created_at', 'asc'); }
          if ($request->has('new')) {
            $query->orderBy('created_at', 'desc'); }

      $companies = $query->get();
      return $this->apiResponse($companies,true,null,200);}

      catch (\Exception $e) {
        $this->handleException($e);
        // Handle the exception and return an error response
        }

  }
  public function editresearsher( Request $request ,$uuid)
    {
         $user=Researcher::where("uuid",$uuid) ->get();

        return $this->apiResponse($user,1,null,200);

    }

        public function updateprofile($uuid , Request $request){
            $researcher = Researcher::where("uuid",$uuid)->first();
            
            $validateData = $request ->validate([
                'name'=> 'required|string|max:255',
                //'uuid'=>'nullable',
                'email'=>  [
        'required',
        'email',
        Rule::unique('researchers', 'email')->ignore($researcher->id),
    ],

                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'code' => 'nullable|string',
                'phone'=> 'nullable|string',

            ]);


            if($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public'); //هون عم خزن الصور بالمجلد
                $validateData['image'] =$path ; //هون عم اكتب مسار الصورة كامل مشان الفرونت يقدرو يشوفوها
            }
            //return response(($validateData)) ; }}
            //التحديث
            $researcher -> update([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'description' => $validateData['description'] ?? $researcher->description,
                'image' => $validateData['image'] ?? $researcher->image,
                'code' => $validateData['code'] ?? $researcher->code,
                'phone' => $validateData['phone'] ?? $researcher->phone,


            ]);
            return $this->apiResponse($researcher, true, 'تم تحديث الشركة بنجاح', 200);
        }
    }