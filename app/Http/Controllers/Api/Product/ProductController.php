<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth('company')->user()->id;
        $product = product::where('company_id', $id)->get();
        if (!$product) {
            return $this->apiResponse(null, false, 'not found', 404);
        }
        $data['product'] = productResource::collection($product);
        return $this->apiResponse($data, true, null, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string',
                'description' => 'required|string',
                // 'company_uuid' => 'required|integer|exists:companies,uuid',
                'url' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return $this->ValidationError($request->all(), $validator);
        }
        $id = auth("company")->user()->id;
        try {
            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'company_id' => $id,
                'terms' => '',
                'url' => $request->url,
            ]);
            $data['product'] = ProductResource::make($product);
            return $this->apiResponse($data, true, null, 200);
        } catch (\Exception $ex) {
            return $this->apiResponse(null, false, $ex->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deletepackage(Request $request)
    {
        try {
            $Product = Product::where('uuid', $request->uuid)->first();
            if ($Product) {
                $Product->delete();
                return response()->json(['message' => 'تم الحذف بنجاح']);
            }
            return response()->json(['message' => 'حدث خطا اثناء الحذف'] , 400);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
