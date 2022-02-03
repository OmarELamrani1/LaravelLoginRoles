<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PharmacieResource extends JsonResource
{
    
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'designation' => $this->designation,
            'description' => $this->description,
            'date' => $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
