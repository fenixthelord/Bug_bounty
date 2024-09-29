<?php

namespace App\Http\Controllers\api\company;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\CompanyResource\CompanyResource as CompanyResourceCompanyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyLoginController extends Controller
{

    use GeneralTrait;

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
    public function login(Request $request)
    {
        $rules = [
            'email' => [
                'required',
                'string',
                'email',
                'exists:companies,email',  
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

        if ($validator->fails()) 
        {
            $firstError = $validator->errors()->first();
        
            if (strpos($firstError, 'مطلوب') !== false) 
            {
                return $this->requiredField($firstError);  
            }

            return $this->notFoundResponse($firstError);
        }

        $company = Company::where('email', $request->email)->first();

        if (!$company || !Hash::check($request->password, $company->password))
        {
            return $this->unAuthorizeResponse(); // بيانات الاعتماد غير صحيحة
        }

        if ($company->tokens()->exists()) 
        {
            return $this->unAuthorizeResponse();
        }
        
        if ($company->tokens()->exists()) 
        {
            return $this->unAuthorizeResponse();
        }

        $token = $company->createToken('auth_token')->plainTextToken;

        return (new CompanyResourceCompanyResource($company))->successResponseWithToken($token);
    }
    
    public function logout()
    {
        $company = auth()->guard('company')->user();
    
        if ($company && $company->currentAccessToken())
        {
            $company->currentAccessToken()->delete();
        }
        return $this->unAuthorizeResponse();
    }


   
}

