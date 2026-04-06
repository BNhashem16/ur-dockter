<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'country_id',
        'state_id',
        'city_id',
        'street_address',
        'building_name',
        'floor',
        'apartment',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the full formatted address string.
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->country?->name,
            $this->state?->name,
            $this->street_address,
            $this->building_name ? "Building {$this->building_name}" : null,
            $this->floor ? "Floor {$this->floor}" : null,
            $this->apartment ? "Apartment {$this->apartment}" : null,
        ]);

        return implode(', ', $parts);
    }
}
