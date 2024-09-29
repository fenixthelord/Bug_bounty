<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\GeneralTrait;

class ResearcherResource extends JsonResource
{
    use GeneralTrait;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            'uuid' => $this->uuid ,
            'name'=> $this->name ,
            'email' => $this->email,
            'phone' => $this->phone,
            'code' => $this->code,
            'image'=>$this->image,
            'points'=>$this->points,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
    public function successResponse()
    {
        return $this->apiResponse(['researcher' => $this], true, null, 200);
    }
    public function successResponseWithToken($token)
    {
        return $this->apiResponse(['researcher' => $this,'token' => $token], true, null, 200);
    }
}

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
