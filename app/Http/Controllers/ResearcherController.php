<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Researcher;
use App\Http\Traits\UploadImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ResearcherController extends Controller
{
    use UploadImage;

    public function researcherReport()
    {

        $researchers = Researcher::all();
        foreach ($researchers as $researcher) {
            $researcher->calculatePoints();
            $researcher->rating = $researcher->calculateRating();
        }
        return view('reports.researcherreport', compact('researchers'));
    }

    public function index()
    {
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
        if ($request->IsMethod("post")) {

            $validator = validator::make($request->all(), [
                'name' => 'required|string|regex:/[a-z]/',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('researchers', 'email')->ignore(Researcher::where('uuid', $request->uuid)->pluck('id')->first()), // استبدل $id بمعرف الصف الذي تريد تجاهله
                ],
                'phone' => 'required|string',
                'code' => 'nullable|string|max:5',
                'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
                'facebook' => [
                    'nullable',
                    'string',
                    Rule::unique('researchers', 'facebook')->ignore($request->uuid, 'uuid'), // استبدل $id بمعرف الصف الذي تريد تجاهله
                ],
                'linkedin' => [
                    'nullable',
                    'string',
                    Rule::unique('researchers', 'linkedin')->ignore($request->uuid, 'uuid'), // استبدل $id بمعرف الصف الذي تريد تجاهله

                ],
                'github' => [
                    'nullable',
                    'string',
                    Rule::unique('researchers', 'github')->ignore($request->uuid, 'uuid'), // استبدل $id بمعرف الصف الذي تريد تجاهله
                ],
            ]);

            if ($validator->fails()) {
                return $validator->errors()->first();
            } else {


                $exsistResearcher = Researcher::where([['name', $request->name], ['email', $request->email], ['phone', $request->phone], ['facebook', $request->facebook], ['github', $request->github]])->first();
                
                if ($exsistResearcher) {
                    return response()->json(['message' => 'The researcher has been exsist already'], 409);
                } else {

                    $image = $this->uploadimage($request, 'images');
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
                    // dd(session());
                    $updated = $researcher->update($data);
                    if ($updated) {
                        return redirect()->back()->withInput();
                    }
                }
            }
        }
    }

    public function destroy(string $uuid)
    {

        $researcher = Researcher::where('uuid', $uuid)->first();
        $researcher->delete();
        return redirect()->route('trashed.researcher');
    }

    public function restore(string $uuid)
    {
        $researcher = Researcher::withTrashed()->where('uuid', $uuid)->restore();
        $researchers = Researcher::all();
        return view('researcher.show', ['researchers' => $researchers]);
    }

    public function trashed()
    {
        $trachedModels = Researcher::onlyTrashed()->get();
        return view('researcher.index', ['researchers' => $trachedModels]);
    }
}