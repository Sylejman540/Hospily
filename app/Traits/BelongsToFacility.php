<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * BelongsToFacility Trait
 * 
 * Automatically scopes queries to authenticated user's facility.
 * This trait MUST be used on all multi-tenant models to prevent cross-facility access.
 * 
 * Every query is automatically scoped by facility_id of authenticated user.
 */
trait BelongsToFacility
{
    /**
     * Boot the trait
     */
    protected static function bootBelongsToFacility(): void
    {
        static::addGlobalScope(function (Builder $builder) {
            // Only apply scope if user is authenticated
            if (auth()->check()) {
                $builder->where('facility_id', auth()->user()->facility_id);
            }
        });
    }

    /**
     * Scope: get records for specific facility
     * Use this when you need to explicitly query a different scope context
     */
    public function scopeForFacility(Builder $query, int $facilityId): Builder
    {
        return $query->where('facility_id', $facilityId);
    }

    /**
     * Relationship: belongs to facility
     */
    public function facility()
    {
        return $this->belongsTo(\App\Models\Facility::class);
    }
}
