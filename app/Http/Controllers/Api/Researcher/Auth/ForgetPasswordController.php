<?php

namespace App\Http\Controllers\Api\Researcher\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Mail\ForgetPasswordEmail;
use App\Models\Researcher;
use Illuminate\Http\Request;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{

    use GeneralTrait;

    public function __construct()
    {
        $this->middleware('guest:researcher');
    }

    public function GenerateOTP(Request $request)
    {
        $validate = Validator::make(
            ['email' => $request->email],
            [
<<<<<<< HEAD
                'email' => 'required|email|exists:researchers:email'
=======
<<<<<<< HEAD
                'email' => 'required|email|exists:researchers:email'
=======
                'email' => 'required|email|exists:researchers,email'
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            ]
        );
        if ($validate->fails()) {
            /**
             * data = $request->all()
             * message = $validate->errors()->first()
             * status = false
             * statusCode = 400
             */
            return $this->ValidationError($request->all(), $validate);
        }
        try {

            /**
             * Generate otp 
             * length = 4 
             * expired after 6 minutes
             */
            $otp = (new Otp())->generate($request->email, 'numeric');

            if ($otp->status == true) {

                $subjectTitle =  "Reset your password";
                $description = "Use this code to reset your password , ⚠ don't giv this code to anyone";
                $otp = $otp->token;

                Mail::to($request->email)->send(new ForgetPasswordEmail($subjectTitle, $otp, $description));


                return $this->SuccessResponse();
            } else {
                # 400 
                return $this->requiredField('something went wrong , please try again');
            }
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function ValidateOtp(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'otp' => 'required|numeric',
<<<<<<< HEAD
                'email' => 'required|email|exists:researchers:email',
=======
<<<<<<< HEAD
                'email' => 'required|email|exists:researchers:email',
=======
                'email' => 'required|email|exists:researchers,email',
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            ]
        );
        if ($validate->fails()) {
            /**
             * data = $request->all()
             * message = $validate->errors()->first()
             * status = false
             * statusCode = 400
             */
            return $this->ValidationError($request->all(), $validate);
        }
        try {
            $otp = (new Otp())->validate($request->email, $request->otp);
            if ($otp->status == true) {
<<<<<<< HEAD
                $otp = (new Otp())->generate($request->email, 'numeric');
                $data['otp'] = $otp->token;
=======
<<<<<<< HEAD
                $otp = (new Otp())->generate($request->email, 'numeric');
                $data['otp'] = $otp->token;
=======
                $user = Researcher::where('email', $request->email)->pluck("uuid")->first();
                $data['uuid'] = $user;
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
                return $this->SuccessResponse($data);
            } else {
                return $this->requiredField('Invalid otp');
            }
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function ResetPassword(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'otp' => 'required|numeric',
                'password' => 'required|min:8|confirmed',
<<<<<<< HEAD
                'email' => 'required|email|exists:researchers:email',
=======
<<<<<<< HEAD
                'email' => 'required|email|exists:researchers:email',
=======
                'email' => 'required|email|exists:researchers,email',
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            ]
        );
        if ($validate->fails()) {
            /**
             * data = $request->all()
             * message = $validate->errors()->first()
             * status = false
             * statusCode = 400
             */
            return $this->ValidationError($request->all(), $validate);
        }
        try {
            $otp = (new Otp())->validate($request->email, $request->otp);
            if ($otp->status == true) {
                $researcher = Researcher::where('email', $request->email)->first();
                $researcher->update([
                    'password' => Hash::make($request->password)
                ]);
                return $this->SuccessResponse();
            } else {
                return $this->requiredField('Invalid otp');
            }
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }
}
