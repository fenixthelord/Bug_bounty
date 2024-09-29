<?php

namespace App\Http\Resources\CompanyResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
<<<<<<< HEAD
            'uuid' => $this-> uuid,
            'name' => $this -> name ,
            'email' => $this -> email,
            'type' => $this -> type ,
            'description' => $this -> discription ,
            'logo' => env('LOGO_URL_PATH') . $this -> logo ,
            'domain' => $this -> domain ,
            'employess_count' => $this -> employess_count ,
=======
            'uuid' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'description' => $this->discription,
            'logo' => env('LOGO_URL_PATH') . $this->logo,
            'domain' => $this->domain,
            'employess_count' => $this->employess_count,
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
        ];
    }
}
