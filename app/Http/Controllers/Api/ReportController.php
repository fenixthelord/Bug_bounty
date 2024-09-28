<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResourseResearch;
use App\Http\Traits\GeneralTrait;
use App\Models\Report;
use App\Models\Researcher;
use Auth;
use Illuminate\Http\Request;
use Validator;

class ReportController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth:researcher');

    }
    public function ReportByResearcher(Request $request)
    {
        try {
            //code...
            // $id = $request->researcher;
            $idreseacher = auth('researcher')->user()->id;
            $reports = Report::where('researcher_id', $idreseacher)->get();
            // dd($reports);
            if ($reports) {
                $data['reports'] = ReportResourseResearch::collection($reports);
                return $this->apiResponse($data, true, null, 200);
            } else {
                return $this->apiResponse(null, true, null, 200);
            }
        } catch (\Exception $ex) {
            return $this->apiResponse(null, false, $ex->getMessage(), 500);
        }
    }
    public function addreport(Request $request)
    {
        try {
            //code...

            $idreseacher =auth('researcher')->user()->id;
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|exists:products,id',
                'title' => 'required|string',
                'report_file' => 'required|mimes:pdf,docx|max:2048'
            ]);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return $this->apiResponse(null, false, $error, 400);
            }
            // dd($request->file('report-file'));
            $d = $request->file('report_file')->store('files', 'public');

            $report = Report::create([
                'title' => $request->title,
                'status' => 'pending',
                'product_id' => $request->product_id,
                // 'researcher_id' => $idreseacher,
                'researcher_id' => $request->idreseacher,
                'review_status' => 0,
                'file' => env('PATH_IMG') . $d,
            ]);

            if ($report) {
                $data['report'] = ReportResourseResearch::make($report);
                return $this->apiResponse($data);
            } else {
                return $this->apiResponse(null, false, 'حدث خطا حاول الاضافة مرة أخرى', 200);


            }
        } catch (\Exception $ex) {
            return $this->apiResponse(null, false, $ex->getMessage(), 500);
        }
    }
    //
}
