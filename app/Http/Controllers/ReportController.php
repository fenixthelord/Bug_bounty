<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;  
use App\Models\Researcher;  

class ReportController extends Controller {
    public function index() {  
        $reports = Report::with(['product', 'researcher'])->get();

        return view('reports.index', compact('reports'));  
    }  

    public function showResearcherReports($researcherUuid) {  
        $researcher = Researcher::where('uuid', $researcherUuid)->firstOrFail();  
        $reports = $researcher->reports()->with('product')->get();

        return view('reports.researcher', compact('researcher', 'reports'));  
    }  

    public function showPendingReports() {  
        $reports = Report::with(['product', 'researcher'])->where('status', 'pending')->get();

        return view('reports.pending', compact('reports'));  
    } 

    public function updateStatus(Request $request, $reportUuid) {  
        $validated = $request->validate([  
            'status' => 'required|in:pending,accept,reject',  
        ]);  

        $report = Report::where('uuid', $reportUuid)->firstOrFail();  
        $previousStatus = $report->status;  

        $report->update([  
            'status' => $validated['status'],  
        ]);  

        if ($validated['status'] === 'accept' && $previousStatus !== 'accept') {  
            $researcher = $report->researcher;  
            $researcher->addPoints(1); 
        }  

        return redirect()->route('reports.index')
        ->with('success', 'Report status updated successfully.');  
    }  
}
