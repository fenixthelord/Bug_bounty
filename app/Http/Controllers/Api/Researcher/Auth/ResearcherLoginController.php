<?php

namespace App\Http\Controllers\Api\Researcher\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use  App\Models\Researcher;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ResearcherResource;
use Illuminate\Http\Request;

class ResearcherLoginController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     */
<<<<<<< HEAD

=======
>>>>>>> 51cb7950806842786bee4e73d80ddb22ff0599c9
    public function index()
    {
        //
    }
    public function login(Request $request)
    {
        $rules = [
            'email' => [
                'required',
                'string',
                'email',
<<<<<<< HEAD

                'exists:researchers,email',

=======
                'exists:researchers,email',
>>>>>>> 51cb7950806842786bee4e73d80ddb22ff0599c9
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
            ],
        ];

        $messages = [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.string' => 'البريد الإلكتروني يجب أن يكون نصاً صحيحاً',
            'email.email' => 'البريد الإلكتروني يجب أن يكون نمطه بريد إلكتروني',
            'email.exists' => 'البريد الإلكتروني غير مسجل في الشركات',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.string' => 'كلمة المرور يجب أن تكون نصاً صحيحاً',
            'password.min' => 'كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل.',
            'password.max' => 'كلمة المرور يجب ألا تزيد عن 255 حرفاً.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

<<<<<<< HEAD
        if ($validator->fails()) 
        {
            $firstError = $validator->errors()->first();
        
            if (strpos($firstError, 'مطلوب') !== false) 
            {
                return $this->requiredField($firstError);  

=======
>>>>>>> 51cb7950806842786bee4e73d80ddb22ff0599c9
        if ($validator->fails()) {
            $firstError = $validator->errors()->first();

            if (strpos($firstError, 'مطلوب') !== false) {
                return $this->requiredField($firstError);
<<<<<<< HEAD

=======
>>>>>>> 51cb7950806842786bee4e73d80ddb22ff0599c9
            }

            return $this->notFoundResponse($firstError);
        }

        $researcher = Researcher::where('email', $request->email)->first();

<<<<<<< HEAD

        if (!$researcher || !\Hash::check($request->password, $researcher->password))
        {
            return $this->unAuthorizeResponse(); // بيانات الاعتماد غير صحيحة
        }

        if(is_null($researcher->code))
        {
            return $this->notFoundResponse('الحساب غير مفعل عليك إدخال الكود لتفعيله');   
        }

        if ($researcher->tokens()->exists()) 
        {

=======
>>>>>>> 51cb7950806842786bee4e73d80ddb22ff0599c9
        if (!$researcher || !\Hash::check($request->password, $researcher->password)) {
            return $this->unAuthorizeResponse(); // بيانات الاعتماد غير صحيحة
        }

        if (is_null($researcher->code)) {
            return $this->notFoundResponse('الحساب غير مفعل عليك إدخال الكود لتفعيله');
        }

<<<<<<< HEAD:app/Http/Controllers/api/researcher/ResearcherLoginController.php
        if ($researcher->tokens()->exists()) {
<<<<<<< HEAD

=======
>>>>>>> 51cb7950806842786bee4e73d80ddb22ff0599c9
            return $this->unAuthorizeResponse();
        }
=======
        // if ($researcher->tokens()->exists()) {
        //     return $this->unAuthorizeResponse();
        // }
>>>>>>> 8a87b85bf42072bad5b090fc7fe62e83fd14d2a5:app/Http/Controllers/Api/Researcher/Auth/ResearcherLoginController.php

        $token = $researcher->createToken('auth_token')->plainTextToken;

        return (new ResearcherResource($researcher))->successResponseWithToken($token);
    }
<<<<<<< HEAD
  
    public function logout()
    {
        $researcher = auth()->guard('researcher')->user();
    
        if ($researcher && $researcher->currentAccessToken())
        {
            $researcher->currentAccessToken()->delete();
            return response()->json('تم تسجيل الخروج بنجاح', 200);
        } 

=======
>>>>>>> 51cb7950806842786bee4e73d80ddb22ff0599c9

    public function logout()
    {
        $researcher = auth()->guard('researcher')->user();

        if ($researcher && $researcher->currentAccessToken()) {
            $researcher->currentAccessToken()->delete();
        }
<<<<<<< HEAD:app/Http/Controllers/api/researcher/ResearcherLoginController.php
<<<<<<< HEAD
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
=======
>>>>>>> 51cb7950806842786bee4e73d80ddb22ff0599c9
        return $this->unAuthorizeResponse();
=======
        return response()->json(['message' => 'تم تسجيل الخروج بنجاح']);
>>>>>>> 8a87b85bf42072bad5b090fc7fe62e83fd14d2a5:app/Http/Controllers/Api/Researcher/Auth/ResearcherLoginController.php
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
