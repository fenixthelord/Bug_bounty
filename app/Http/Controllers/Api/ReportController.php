<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\Company;
use App\Models\Report;
use Auth;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class ReportController extends Controller
{
    use GeneralTrait;
    public function ReportByCompany(Request $request)
    {
        $company_id = auth('company')->user();
        // $company_id = $request->id;
        $company=Company::find($company_id);
        $report = $company->reports()->get();

        if(!$report){
            return $this->apiResponse(null,false,'not found',404);
        }
        $data['report']=ReportResource::collection($report);
        return $this->apiResponse($data,true,null,200);
    }
}
