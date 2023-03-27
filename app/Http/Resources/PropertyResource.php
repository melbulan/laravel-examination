<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'size' => $this->size,
            'description' => $this->description,
            'address' => $this->address,
            'price' => $this->price,
            'council_tax_band' => $this->council_tax_band,
            'tenure' => $this->tenure,
            'images' => $this->getMedia('media'),
            'property_type' => $this->propertyType,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
