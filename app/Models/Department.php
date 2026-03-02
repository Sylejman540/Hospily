<?php

namespace App\Models;

use App\Traits\BelongsToFacility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use BelongsToFacility;

    protected $fillable = [
        'facility_id',
        'name',
        'total_beds',
        'color_theme',
    ];

    /**
     * Get all patients in this department
     */
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * Get all appointments in this department
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
