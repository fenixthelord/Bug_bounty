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
        $user = auth()->user();
        if (!$user || !$user->isSuperAdmin()) {
            return redirect()->route('home')->with('error', 'غير مصرح لك بإضافة مشرفين.');
        }

        return view('admin.create');
    }

    public function store(Request $request) {
        $user = auth()->user();
        if (!$user || !$user->isSuperAdmin()) {
            return redirect()->route('home')->with('error', 'غير مصرح لك بإضافة مشرفين.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:10',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'type' => 'admin',
        ]);

        return redirect()->route('admin.index')->with('success', 'تم إضافة المشرف بنجاح.');
    }

    public function index() {
        $admins = User::where('type', 'admin')->get();
        return view('admin.index', compact('admins'));
    }
}