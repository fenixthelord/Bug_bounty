<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $specializations=Specialization::all();
        return view('layouts.Specialization.index',['specializations'=>$specializations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.Specialization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $title=request()->title;
        Specialization::create(['title'=>$title]);

        return redirect('home/specializations')->with('success','you added a Specialization!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $specialization=Specialization::findOrFail($id);
        $companies=$specialization->companies;
        return view('layouts.Specialization.company',compact('specialization','companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        //
        return view('layouts.Specialization.edit',['specialization'=>$specialization]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $specialization = Specialization::findOrFail($id);
    $specialization->delete();

    return redirect()->route('specializations.index')->with('success', 'Specialization deleted successfully.');
    }
    public function restore($id)
{
    $specialization = Specialization::withTrashed()->findOrFail($id);
    $specialization->restore();

    return redirect()->route('specializations.index')->with('success', 'Specialization restored successfully.');
}
}


