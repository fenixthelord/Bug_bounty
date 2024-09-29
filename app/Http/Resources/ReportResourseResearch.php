<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResourseResearch extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'id'=>$this->uuid,
            'title'=>$this->title,
            'company_name' => CompanyResource::collection($this->product?->company?->get('name')),
            'created_at' =>$this->created_at,
            'file' => $this->file ,
            'status' => $this->status
        ];
    }
}
