<?php

namespace App\Http\Resources;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    use GeneralTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'company' => [
                'uuid' => $this->uuid,
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'logo' => $this->logo,
                'type' => $this->type,
                'description' => $this->description,
                'domain' => $this->domain,
                'employess_count' => $this->employess_count,
                'created_at' => $this->created_at->toDateTimeString(),
            ]
        ];
    }
    public function successResponse()
    {
        return $this->apiResponse(['company' => $this], true, null, 200);
    }
    public function successResponseWithToken($token)
    {
        return $this->apiResponse(['company' => $this, 'token' => $token], true, null, 200);
    }
}
