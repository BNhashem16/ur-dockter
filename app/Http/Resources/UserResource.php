<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'account_type' => $this->account_type,
            'group_name' => $this->group_name,
            'owner_name' => $this->owner_name,
            'email' => $this->email,
            'phone_country_code' => $this->phone_country_code,
            'phone_number' => $this->phone_number,
            'country' => new CountryResource($this->whenLoaded('country')),
            'state' => new StateResource($this->whenLoaded('state')),
            'city' => new CityResource($this->whenLoaded('city')),
            'email_verified' => $this->isEmailVerified(),
            'phone_verified' => $this->isPhoneVerified(),
            'account_status' => $this->account_status,
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}
