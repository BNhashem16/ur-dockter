<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'country' => new CountryResource($this->whenLoaded('country')),
            'state' => new StateResource($this->whenLoaded('state')),
            'city' => new CityResource($this->whenLoaded('city')),
            'street_address' => $this->street_address,
            'building_name' => $this->building_name,
            'floor' => $this->floor,
            'apartment' => $this->apartment,
            'full_address' => $this->full_address,
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}
