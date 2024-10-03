<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;  
use App\Models\Researcher;  



class ReportController extends Controller
{
    public function index()  
    {  
        $reports = Report::with(['product', 'researcher'])->get(); // Eager loading to include product and researcher details  
        return view('reports.index', compact('reports'));  
    }  

    // Display reports for a specific researcher  
    public function showResearcherReports($researcherUuid)  
    {  
        $researcher = Researcher::where('uuid', $researcherUuid)->firstOrFail();  
        $reports = $researcher->reports()->with('product')->get(); // Eager loading product details  
        return view('reports.researcher', compact('researcher', 'reports'));  
    }  

    // Display reports with pending status  
    public function showPendingReports()  
    {  
        $reports = Report::with(['product', 'researcher'])->where('status', 'pending')->get(); // Eager loading  
        return view('reports.pending', compact('reports'));  
    }  
    public function updateStatus(Request $request, $reportUuid)  
    {  
        $validated = $request->validate([  
            'status' => 'required|in:pending,accept,reject',  
        ]);  

        $report = Report::where('uuid', $reportUuid)->firstOrFail();  
        $previousStatus = $report->status;  

        // Update report status  
        $report->update([  
            'status' => $validated['status'],  
        ]);  

        // If the report is accepted, add points to the researcher  
        if ($validated['status'] === 'accept' && $previousStatus !== 'accept') {  
            $researcher = $report->researcher;  
            $researcher->addPoints(1); // Add 1 point to the researcher's points  
        }  

        return redirect()->route('reports.index')->with('success', 'Report status updated successfully.');  
    }  


}
