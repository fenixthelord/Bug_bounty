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
=======
<<<<<<< HEAD
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
            'id'=>$this->uuid,
            'title'=>$this->title,
            'description'=>$this->description,
            'url'=>$this->url,
            'deleted_at'=>$this->deleted_at,
<<<<<<< HEAD
=======
=======
            'uuid'=>$this->uuid,
            'title'=>$this->title,
            'description'=>$this->description,
            'url'=>$this->url,
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
        ];
    }
}
