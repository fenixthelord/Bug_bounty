<?php

namespace App\Http\Controllers\researcher;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearcherController extends Controller
{
use GeneralTrait;
    public function searchCompany( Request $request)
    {
        try {
      if ($request->name==null and $request->avaibility==null && $request->new==null )
      {
        return $this->apiResponse (Company::all(),1,null,200);
      }

    $query = Company::query();

      if ($request->has('name')) {
          $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
      }

      if ($request->has('unavailability')) {
          $query->withTrashed();
      }

      if ($request->has('old')) {
          $query->orderBy('created_at', 'asc'); }
          if ($request->has('new')) {
            $query->orderBy('created_at', 'desc'); }

      $companies = $query->get();
      return $this->apiResponse($companies,true,null,200);}

      catch (\Exception $e) {
        $this->handleException($e);
        // Handle the exception and return an error response
        }
  }


}
