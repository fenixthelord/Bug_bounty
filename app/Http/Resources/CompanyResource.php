<?php

namespace App\Http\Resources;

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use App\Http\Traits\GeneralTrait;
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    use GeneralTrait;
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'uuid' => $this->uuid ,
            'name'=> $this->name ,
            'phone' => $this->phone,
            'email' => $this->email,
            'logo' => $this->logo,
            'type' => $this->type,
            'description' => $this->description,
            'domain' => $this->domain,
            'employess_count' => $this->employess_count,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
    public function successResponse()
    {
        return $this->apiResponse(['company' => $this], true, null, 200);
    }
    public function successResponseWithToken($token)
    {
        return $this->apiResponse(['company' => $this,'token' => $token], true, null, 200);
    }
}






