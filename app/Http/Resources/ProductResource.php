<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
<<<<<<< HEAD

            'id'=>$this->uuid,
            'title'=>$this->title,
            'description'=>$this->description,
            'url'=>$this->url,
            'deleted_at'=>$this->deleted_at,

            'uuid'=>$this->uuid,
            'title'=>$this->title,
            'description'=>$this->description,
            'url'=>$this->url,

=======
            'product' => [
                'uuid' => $this->uuid,
                'title' => $this->title,
                'description' => $this->description,
                'url' => $this->url,
            ]
>>>>>>> f19ece9370eda508944c995b9c038e6beaa4e328
=======
            'uuid' => $this->uuid,
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
>>>>>>> 8a87b85bf42072bad5b090fc7fe62e83fd14d2a5
        ];
    }
}
