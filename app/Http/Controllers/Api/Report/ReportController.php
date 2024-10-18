<?php

namespace App\Http\Controllers\Api\Report;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReportResource;
use App\Http\Resources\ReportResourseResearch;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
    use GeneralTrait;
    public function ReportByResearcher(Request $request)
    {
        try {

            $idreseacher = auth('researcher')->user()->id;


            $pageNumber = request()->input('page', 1);
            $perPage = 10;
            $reports = Report::where('researcher_id', $idreseacher)->paginate($perPage, ['*'], 'page', $pageNumber);
            if ($pageNumber > $reports->lastPage() || $pageNumber < 1) {
                return $this->apiResponse(null, false, 'Invalid page number', 400);
            }
            $data = [
                'researchers' => $reports->count() > 0 ? ReportResourseResearch::collection($reports) : null,
                'current_page' => $reports->currentPage(),
                'next_page' => $reports->nextPageUrl(),
                'previous_page' => $reports->previousPageUrl(),
                'total_pages' => $reports->lastPage(),

            ];
            return $this->apiResponse($data, true, null, 200);
        } catch (\Exception $ex) {
            return $this->apiResponse(null, false, $ex->getMessage(), 500);
        }
    }

    public function showAll()
    {
        $reports = Product::all();
        if ($reports) {
            $data['Product'] = ProductResource::collection($reports);
            return $this->apiResponse($data, true, null, 200);
        } else {
            return $this->apiResponse(null, true, null, 200);
        }
    }

    public function addreport(Request $request)
    {
        try {
            //code...

            $idreseacher = auth('researcher')->user()->id;
            $validator = Validator::make($request->all(), [
                'product_uuid' => 'required|exists:products,uuid',
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
                'product_id' => Product::where('uuid', $request->product_uuid)->pluck('id')->first(),
                'researcher_id' => $idreseacher,
                'review_status' => 0,
                'file' => $d,
            ]);

            if ($report) {
                $data['report'] = ReportResourseResearch::make($report);
                return $this->SuccessResponse($data);
            } else {
                return $this->apiResponse(null, false, 'حدث خطا حاول الاضافة مرة أخرى', 200);
            }
        } catch (\Exception $ex) {
            return $this->apiResponse(null, false, $ex->getMessage(), 500);
        }
    }
    //
    public function ReportByCompany(Request $request)
    {
        $company = auth('company')->user();
        // $company = Company::find($company_id);
        // $report = $company->reports()->get();


        $pageNumber = request()->input('page');
        $perPage = 10;

        $reports = Report::whereNotIn('status', ['pending', 'reject'])
            ->whereIn(
                'product_id',
                Product::where('company_id', $company->id)->pluck('id')->toArray()
            )
            ->paginate($perPage, ['*'], 'page', $pageNumber);

        if ($pageNumber > $reports->lastPage() || $pageNumber < 1) {
            return $this->apiResponse(null, false, 'Invalid page number', 400);
        }
        $data = [
            'reports' => ReportResource::collection($reports),
            'current_page' => $reports->currentPage(),
            'next_page' => $reports->nextPageUrl(),
            'previous_page' => $reports->previousPageUrl(),
            'total_pages' => $reports->lastPage(),
        ];

        return $this->SuccessResponse($data);
    }

    public function Rate($uuid, Request $request)
    {
        $validator = Validator::make(
            [
                'uuid' => $uuid,
                "rate" => request('rate'),
            ],
            [

                'uuid' => [
                    'required',
                    Rule::exists("reports")->where('uuid', $uuid),
                ],

                'rate' => 'required|integer|between:0,5',
            ]
        );
        if ($validator->fails()) {
            /**
             * data = null 
             * error = $validator->errors()->first()
             * status code = 400 
             */
            return $this->ValidationError($request->all(), $validator);
        }
        try {
            $report = Report::where('uuid', $uuid)->first();

            if ($report->update(['rate' => $request->rate])) {
                $data = [
                    'message' => "تمت اضافة التقييم",
                ];
                return $this->SuccessResponse($data);
            }
            return $this->requiredField("حدث خطا , حاول مرة اخرى");
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
