<?php

namespace App\Models;

use App\Traits\BelongsToFacility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use BelongsToFacility;

    protected $fillable = [
        'facility_id',
        'department_id',
        'mrn',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'care_status',
        'admitted_at',
        'discharged_at',
    ];

    protected $casts = [
        'dob' => 'date',
        'admitted_at' => 'datetime',
        'discharged_at' => 'datetime',
    ];

    /**
     * Get the department this patient belongs to
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get all appointments for this patient
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get full name
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Check if patient is discharged
     */
    public function isDischarged(): bool
    {
        return $this->discharged_at !== null;
    }

    /**
     * Auto-generate MRN in format: {FACILITY_ID}-{4_DIGIT_SEQUENCE}
     * Example: 3-0001, 3-0002
     * Must be called inside a transaction
     */
    public static function generateMrn(int $facilityId): string
    {
        // Get the last patient's MRN for this facility
        $lastPatient = self::where('facility_id', $facilityId)
            ->orderByDesc('id')
            ->select('mrn')
            ->first();

        if ($lastPatient) {
            // Extract sequence from existing MRN
            $parts = explode('-', $lastPatient->mrn);
            $sequence = (int)$parts[1] + 1;
        } else {
            // First patient for this facility
            $sequence = 1;
        }

        return "{$facilityId}-" . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }
}
