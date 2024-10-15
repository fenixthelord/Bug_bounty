<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Researcher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ResearcherController extends Controller {
    public function researcherReport() {
        $researchers = Researcher::all();
        foreach ($researchers as $researcher) {
            $researcher->calculatePoints();
            $researcher->rating = $researcher->calculateRating();
        }
        return view('reports.researcherreport', compact('researchers'));
    }

    public function index() {
        $researchers = Researcher::withCount('reports')->get();
        return view('researcher.show', ['researchers' => $researchers]);
    }

    public function edit(string $uuid)
    {
        $researcher = Researcher::where('uuid', $uuid)->first();
        return view('researcher.edit', ['researcher' => $researcher]);
    }

    public function update(Request $request, string $uuid)
    {
        if ($request->isMethod("post")) {
            $validator = validator::make($request->all(), [
                'name' => 'required|string|regex:/[a-z]/',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('researchers', 'email')->ignore(Researcher::where('uuid', $request->uuid)->pluck('id')->first()),
                ],
                'phone' => 'required|string',
                'code' => 'nullable|string|max:5',
                'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
                'facebook' => [
                    'nullable',
                    'string',
                    Rule::unique('researchers', 'facebook')->ignore($request->uuid, 'uuid'),
                ],
                'linkedin' => [
                    'nullable',
                    'string',
                    Rule::unique('researchers', 'linkedin')->ignore($request->uuid, 'uuid'),
                ],
                'github' => [
                    'nullable',
                    'string',
                    Rule::unique('researchers', 'github')->ignore($request->uuid, 'uuid'),
                ],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $exsistResearcher = Researcher::where([['name', $request->name], ['email', $request->email], ['phone', $request->phone], ['facebook', $request->facebook], ['github', $request->github]])->first();

            if ($exsistResearcher) {
                return redirect()->back()->with('error', 'الباحث موجود بالفعل')->withInput();
            }

            $image = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('images', 'public');
            }

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'code' => $request->code,
                'image' => $image,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'github' => $request->github
            ];
            
            $researcher = Researcher::where('uuid', $uuid)->first();
            $updated = $researcher->update($data);

            if ($updated) {
                return redirect()->route('show.researcher')->with('success', 'تم تحديث الباحث بنجاح');
            }
        }

        return redirect()->back()->with('error', 'فشل تحديث الباحث')->withInput();
    }

    public function destroy(string $uuid) {
        $researcher = Researcher::where('uuid', $uuid)->first();
        $researcher->delete();
        return redirect()->route('trashed.researcher');
    }

    public function restore($id) {
        $researcher = Researcher::withTrashed()->findOrFail($id);
        $researcher->restore();
        return redirect()->route('show.researcher')->with('success', 'تمت استعادة الباحث بنجاح');
    }

    public function trashed() {
        $trachedModels = Researcher::onlyTrashed()->get();
        return view('researcher.index', ['researchers' => $trachedModels]);
    }

    public function forceDelete($id) {
        $researcher = Researcher::withTrashed()->findOrFail($id);
        $researcher->forceDelete();

        return redirect()->route('show.researcher')->with('success', 'تم حذف الباحث نهائياً بنجاح');
    }
}