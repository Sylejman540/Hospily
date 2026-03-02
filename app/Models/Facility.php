<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facility extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'address',
        'city',
        'country',
        'timezone',
    ];

    /**
     * Get all users for this facility
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get all departments for this facility
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    /**
     * Get all patients for this facility
     */
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * Get all appointments for this facility
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get all alerts for this facility
     */
    public function alerts(): HasMany
    {
        return $this->hasMany(HandoverAlert::class);
    }
}
