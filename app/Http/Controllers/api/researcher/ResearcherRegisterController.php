<?php

namespace App\Http\Controllers\api\researcher;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Company;
use App\Models\Researcher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ResearcherResource;
use App\Http\Traits\Uuid;
use Illuminate\Http\Request;

class ResearcherRegisterController extends Controller
{
<<<<<<< HEAD
    
=======
<<<<<<< HEAD
    
=======

>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
    use GeneralTrait;
    use Uuid;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                'string',
<<<<<<< HEAD
                'regex:/^[\p{Arabic}\s]+$/u',
=======
<<<<<<< HEAD
                'regex:/^[\p{Arabic}\s]+$/u',
=======
                'regex:/^[\p{Arabic}a-zA-Z\s]+$/u',
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
                'max:255',
            ],
            'email' => [
                'required',
                'string',
<<<<<<< HEAD
                'email', 
=======
<<<<<<< HEAD
                'email', 
=======
                'email',
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            ],
            'phone' => [
                'required',
                'regex:/^09\d{8}$/',
<<<<<<< HEAD
                'size:10',     
=======
<<<<<<< HEAD
                'size:10',     
=======
                'size:10',
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
            ],
        ];
<<<<<<< HEAD
    
=======
<<<<<<< HEAD
    
=======

>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
        $messages = [
            'email.required' => 'اسم الايميل مطلوب. يرجى إدخال اسم الايميل',
            'email.string' => 'اسم الايميل يجب أن يكون نصاً صحيحاً',
            'email.email' => 'اسم الايميل يجب أن يكون نمطه ايميل',
<<<<<<< HEAD
            'email.unique' => 'اسم الايميل يجب أن يكون فريد', 
=======
<<<<<<< HEAD
            'email.unique' => 'اسم الايميل يجب أن يكون فريد', 
=======
            'email.unique' => 'اسم الايميل يجب أن يكون فريد',
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7

            'name.required' => 'اسم الباحث مطلوب. يرجى إدخال اسم الشخص',
            'name.string' => 'اسم الباحث يجب أن يكون نصاً صحيحاً',
            'name.regex' => 'اسم الباحث يمكن أن يحتوي فقط على حروف عربية، حروف إنجليزية، مسافات، فاصلة عليا (\')، ونقاط (.)',
            'name.min' => 'اسم الباحث يجب أن يحتوي على حرفين على الأقل',
            'name.max' => 'اسم الباحث يجب ألا يزيد عن 255 حرفاً',

            'phone.required' => 'رقم الموبايل يجب أن يحتوي على حرفين على الأقل',
            'phone.regex' => 'رقم الموبايل يجب يحتوي 10 أرقام و يبدأ بالرقمين 09',
            'phone.size' => 'رقم الموبايل يجب ألا يزيد عن 10 أرقام',
<<<<<<< HEAD
            'phone.unique' => 'رقم الموبايل يجب أن يكون فريد', 

            'password.required'=> 'كلمة السر مطلوب. يرجى إدخال كلمة السر',
=======
<<<<<<< HEAD
            'phone.unique' => 'رقم الموبايل يجب أن يكون فريد', 

            'password.required'=> 'كلمة السر مطلوب. يرجى إدخال كلمة السر',
=======
            'phone.unique' => 'رقم الموبايل يجب أن يكون فريد',

            'password.required' => 'كلمة السر مطلوب. يرجى إدخال كلمة السر',
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            'password.string' => 'كلمة السر يجب أن يكون نصاً صحيحاً',
            'password.min' => 'كلمة السر يجب أن يحتوي على 8 على الأقل',
            'password.max' => 'كلمة السر يجب ألا يزيد عن 255 حرفاً',
        ];

        $existingResearcher = Researcher::where('name', $request->name)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
        ->where('email', $request->email)
        ->where('phone', $request->phone)
        ->first(); 

        if($existingResearcher)
        {
            if (Hash::check($request->password, $existingResearcher->password))
            {
                return 'بيانات الباحث موجودة مسبقاً.اذهب للقيام بإدخال الرمز لتفعيل حسابك.';
            }
            return 'هناك خطأ في بيانات الباحث لا يمكن إتمام العملية.';
        }
 
        $validator = Validator::make($request->all(), $rules, $messages);
   
        if ($validator->fails()) 
        {
            $firstError = $validator->errors()->first();

            if (strpos($firstError, 'مطلوب') !== false) 
            {
                return $this->requiredField($firstError);  
<<<<<<< HEAD
=======
=======
            ->where('email', $request->email)
            ->where('phone', $request->phone)
            ->whereNull('code')
            ->first();

        if ($existingResearcher) {
            if (Hash::check($request->password, $existingResearcher->password)) {
                return response()->json([
                    'message' => 'بيانات الباحث موجودة مسبقاً. اذهب للقيام بإدخال الرمز لتفعيل حسابك.'
                ], 409);
            }
            return response()->json([
                'message' => 'هناك خطأ في بيانات الباحث لا يمكن إتمام العملية.'
            ], 400);
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $firstError = $validator->errors()->first();

            if (strpos($firstError, 'مطلوب') !== false) {
                return $this->requiredField($firstError);
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            }
            return $this->notFoundResponse($firstError);
        }

<<<<<<< HEAD
        if(!Researcher::where('email', $request->email)
            ->orWhere('phone', $request->phone)->first())
        {
=======
<<<<<<< HEAD
        if(!Researcher::where('email', $request->email)
            ->orWhere('phone', $request->phone)->first())
        {
=======
        if (!Researcher::where('email', $request->email)
            ->orWhere('phone', $request->phone)->first()) {
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            $researcher = Researcher::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
<<<<<<< HEAD
            ]);
            return (new ResearcherResource($researcher))->successResponse();           
=======
<<<<<<< HEAD
            ]);
            return (new ResearcherResource($researcher))->successResponse();           
=======
                'points' => 0,
            ]);
            return (new ResearcherResource($researcher))->successResponse();
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
        }
        return $this->notFoundResponse('الايميل أو رقم الموبايل موجود مسبقاً');
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
    public function registerCode(Request $request,$uuid)
    {
       $researcherexists=Researcher::where('uuid',$uuid)->first();
    
       if(!$researcherexists)
       {
            return $this->notFoundResponse('لا يمكن طلب رمز لا يوجد باحث لإتمام ذلك');
       }
       $researcher=Researcher::find($researcherexists->id);
       
       $rules = [
<<<<<<< HEAD
=======
=======
    public function registerCode(Request $request, $uuid)
    {
        $researcherexists = Researcher::where('uuid', $uuid)->first();

        if (!$researcherexists) {
            return $this->notFoundResponse('لا يمكن طلب رمز لا يوجد باحث لإتمام ذلك');
        }
        $researcher = Researcher::find($researcherexists->id);

        $rules = [
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            'code' => [
                'required',
                'string',
                // 'size:8',
            ],
        ];
        $messages = [
            'code.required' => 'رمز التحقق مطلوب.',
            'code.integer' => 'رمز التحقق يجب أن يكون رقماً صحيحاً.',
            'code.size' => 'رمز التحقق يجب ألا يزيد عن 8 أرقام',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
    
        if ($validator->fails()) 
        {
            $firstError = $validator->errors()->first();

            if (strpos($firstError, 'مطلوب') !== false) 
            {
                return $this->requiredField($firstError);  
            }
            return $this->notFoundResponse(more: $firstError);
        }          
        if($researcher)
        {
                $researcher->update([
<<<<<<< HEAD
=======
=======

        if ($validator->fails()) {
            return $this->ValidationError($request->all(),$validator);
        }
        if ($researcher) {
            $researcher->update([
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
                'code' => $request->code,
            ]);
            return (new ResearcherResource($researcher))->successResponse();
        }
        return $this->notFoundResponse('لا يمكن طلب رمز لا يوجد باحث لإتمام ذلك');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
