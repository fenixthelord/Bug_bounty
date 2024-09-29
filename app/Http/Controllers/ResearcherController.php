<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Researcher;  


class ResearcherController extends Controller
{
    
    public function index()  
    {  
        
        $researchers = Researcher::all();  

        
        foreach ($researchers as $researcher) {  
            $researcher->calculatePoints(); // Ensure points are calculated  
            $researcher->rating = $researcher->calculateRating(); // Calculate the rating  
        }  

       
        return view('researchers.index', compact('researchers'));  
    }  
      
}
