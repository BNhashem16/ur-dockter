<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\StateResource;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    use ApiResponse;

    /**
     * List all countries for the registration dropdown.
     */
    public function countries(): JsonResponse
    {
        $countries = Country::orderBy('name')->get();

        return $this->success(
            CountryResource::collection($countries),
            'Countries retrieved successfully.'
        );
    }

    /**
     * List states/provinces for a given country.
     */
    public function states(Country $country): JsonResponse
    {
        $states = State::where('country_id', $country->id)
            ->orderBy('name')
            ->get();

        return $this->success(
            StateResource::collection($states),
            'States retrieved successfully.'
        );
    }

    /**
     * List cities for a given state/province.
     */
    public function cities(State $state): JsonResponse
    {
        $cities = City::where('state_id', $state->id)
            ->orderBy('name')
            ->get();

        return $this->success(
            CityResource::collection($cities),
            'Cities retrieved successfully.'
        );
    }
}
