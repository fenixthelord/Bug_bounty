<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function create(Request $request) {
        // dd($user);
        $user = auth()->user();
        if (!$user || !$user->isSuperAdmin()) {
            return redirect()->route('home')->with('error', 'غير مصرح لك بإضافة مشرفين.');
        }
        return view('admin.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $user = auth()->user();
        if (!$user || !$user->isSuperAdmin()) {
            return redirect()->route('home')->with('error', 'غير مصرح لك بإضافة مشرفين.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:10',
        ]);
  //dd($request->file('profile_picture'));
        $profile_picture = $request->file('profile_picture') ? $request->file('profile_picture')
        ->store('picture_profile') : null;
      // dd($profile_picture);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'profile_picture' => $profile_picture,
            'type' => 'admin',
        ]);
        // dd($request->all());
        return redirect()->route('admin.index')->with('success', 'تم إضافة المشرف بنجاح.');
    }

    public function index() {
        $admins = User::where('type', 'admin')->get();
        return view('admin.index', compact('admins'));
    }
}