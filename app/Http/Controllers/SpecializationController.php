<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller {

    public function index() {
        $specializations = Specialization::all();
        return view('specialization.index', ['specializations' => $specializations]);
    }

    public function create() {
        return view('specialization.create');
    }

    public function store(Request $request) {
        $request->validate(['title' => 'required|string|max:255']);
        Specialization::create(['title' => $request->title]);
        return redirect('home/specializations')->with('success', 'تم إضافة تخصص جديد!');
    }

    public function show(string $id) {
        $specialization = Specialization::findOrFail($id);
        return view('specialization.company', compact('specialization'));
    }

    public function edit(Specialization $specialization) {
        return view('specialization.edit', ['specialization' => $specialization]);
    }

    public function update(Request $request, string $id) {
        $request->validate(['title' => 'required|string|max:255']);
        $specialization = Specialization::findOrFail($id);
        $specialization->update(['title' => $request->title]);
        return redirect('/home/specializations')->with('success', 'تم تعديل التخصص بنجاح!');
    }

    public function destroy(string $id) {
        $specialization = Specialization::findOrFail($id);
        $specialization->delete();
        return redirect()->route('specializations')->with('success', 'تم حذف التخصص بنجاح.');
    }

    public function trashed() {
        $trashedSpecializations = Specialization::onlyTrashed()->get();
        return view('specialization.trashed', ['specializations' => $trashedSpecializations]);
    }

    public function restore($id) {
        $specialization = Specialization::withTrashed()->findOrFail($id);
        $specialization->restore();

        return redirect()->route('specializations')->with('success', 'تم استعادة التخصص بنجاح.');
    }

    public function forceDelete($id) {
        $specialization = Specialization::withTrashed()->findOrFail($id);
        $specialization->forceDelete();

        return redirect()->route('specializations')->with('success', 'تم الحذف النهائي للتخصص بنجاح.');
    }
}