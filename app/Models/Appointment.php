<?php

namespace App\Models;

use App\Traits\BelongsToFacility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use BelongsToFacility;

    protected $fillable = [
        'facility_id',
        'patient_id',
        'clinician_id',
        'department_id',
        'scheduled_at',
        'procedure_type',
        'status',
        'notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    /**
     * Get the patient for this appointment
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the clinician (user) for this appointment
     */
    public function clinician(): BelongsTo
    {
        return $this->belongsTo(User::class, 'clinician_id');
    }

    /**
     * Get the department for this appointment
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Scope: filter appointments by date range
     */
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('scheduled_at', [$startDate, $endDate]);
    }

    /**
     * Scope: filter appointments by clinician
     */
    public function scopeForClinician($query, $clinicianId)
    {
        return $query->where('clinician_id', $clinicianId);
    }

    /**
     * Scope: filter appointments by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope: exclude cancelled and completed
     */
    public function scopeActive($query)
    {
        return $query->whereNotIn('status', ['cancelled', 'completed']);
    }
}
