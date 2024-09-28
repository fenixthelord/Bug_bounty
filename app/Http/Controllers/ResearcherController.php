<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Researcher ;
use App\Http\Traits\UploadImage ;
use Illuminate\Support\Facades\Validator;


class ResearcherController extends Controller
{
    use UploadImage ;
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $researchers = Researcher::withCount('reports')->get() ;
        
        return view('researcher.show',['researchers'=>$researchers ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $researcher =Researcher::where('uuid',$uuid)->first();
      
        return view('researcher.edit',['researcher'=> $researcher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        if($request->IsMethod("post"))
        {  
           
            $validator=validator::make($request->all(),[
                'name'=>'required|string|regex:/[a-z]/' ,
                'email'=>'required|email|unique:researchers,email', 
                'phone' => 'required|string',
                'code'=>'required|string|max:5',
                'image'=>'required|file|mimes:jpeg,png,jpg,gif|max:2048',
                'facebook'=>'required|string|unique:researchers,facebook' ,
                'linkedin'=>'required|string|unique:researchers,linkedin',
                'github'=>'required|string|unique:researchers,github',
            ]);
            if($validator->fails()){
                return $validator->errors()->first();
                }   else{  
                   

                    $exsistResearcher = Researcher::where([['name',$request->name],['email',$request->email],['phone',$request->phone],['facebook',$request->facebook],['github',$request->github]])->first() ;

                    if($exsistResearcher){
                        return response()->json(['message' => 'The researcher has been exsist already'], 409);
                     } else{  
                      
                        $image = $this->uploadimage($request,'images') ;
                        $data = [
                    
                            'name'=>$request->name,
                            'email'=>$request->email,
                            'phone'=>$request->phone,
                            'code'=>$request->code,
                            'image'=>$image,
                            'facebook'=>$request->facebook,
                            'linkedin'=>$request->linkedin,
                            'github'=>$request->github
                        ] ;
                        $researcher =Researcher::where('uuid',$uuid)->first();
                    
                        $updated = $researcher->update($data);  
                 if($updated){
                    return redirect()->back()->withInput() ;

                }}
                }}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $researcher = Researcher::where('uuid',$uuid)->first() ;
        $researcher->delete() ;
        $res =Researcher::all() ; 
        return view('researcher.show',['researchers'=>$res]) ;

    }
    
    public function restore(string $uuid)
    {
       $researcher = Researcher::withTrashed()->where('uuid',$uuid)->restore() ;
      $researchers= Researcher::all() ;
      return view('researcher.show',['researchers'=>$researchers]) ;
       
    }
    public function trashed()
    {
        $trachedModels = Researcher::onlyTrashed()->get() ; 
    
       return view('researcher.index',['researchers'=>$trachedModels]);
        
    }
}
