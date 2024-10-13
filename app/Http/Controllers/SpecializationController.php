<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller {
    public function index() {
        $specializations=Specialization::all();
        return view('Specialization.index', ['specializations'=>$specializations]);
    }

    public function create() {

        return view('Specialization.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $title=request()->title;
        Specialization::create(['title'=>$title]);

        return redirect('home/specializations')->with('success','you added a Specialization!');
    }

    public function show(string $id) {
        $specialization=Specialization::findOrFail($id);
        $companies=$specialization->companies;
        return view('Specialization.company', compact('specialization','companies'));
    }

    public function edit(Specialization $specialization) {
        return view('Specialization.edit', ['specialization'=>$specialization]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'title'=>'required|string|max:255'
           ]);
            $title=request()->title;
            $specialization=Specialization::findOrFail($id);
            $specialization->update([
                'title'=>$request->title
            ]);
               
               return redirect('/home/specializations')->with('success','you edit a specialization!');
    }
   
    public function destroy(string $id) {
        $specialization = Specialization::findOrFail($id);
        $specialization->delete();

        return redirect()->route('specializations.index')->with('success', 'Specialization deleted successfully.');
    }
    
    public function restore($id) {
        $specialization = Specialization::withTrashed()->findOrFail($id);
        $specialization->restore();

        return redirect()->route('specializations.index')->with('success', 'Specialization restored successfully.');
    }
}


