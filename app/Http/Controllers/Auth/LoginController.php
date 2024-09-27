<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form() {
        return view('auth.login');
    }

    public function login(Request $request) {
    $request->validate([
        'UserMail' => 'required',
        'password' => 'required',
    ]);

    $login = $request->input('UserMail');

    if (is_numeric($login)) {
        $credentials = ['phone' => $login, 'password' => $request->password];
    } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $credentials = ['email' => $login, 'password' => $request->password];
    } else {
        return redirect()->back()->withErrors(['UserMail' => 'البريد الإلكتروني أو رقم الهاتف غير صحيح'])->withInput();
    }

    if (auth()->attempt($credentials)) {
        $user = auth()->user();
        if ($user) {
            return redirect()->route('Admin-Panel');
        }
    } else {
        return redirect()->back()->withErrors(['UserMail' => 'خطأ في بيانات تسجيل الدخول'])->withInput();
    }
}

    public function logout() {
        \Auth::logout();
        return redirect()->route('login');
    }
}