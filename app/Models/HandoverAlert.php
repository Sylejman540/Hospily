<?php

namespace App\Models;

use App\Traits\BelongsToFacility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HandoverAlert extends Model
{
    use BelongsToFacility;

    protected $table = 'handover_alerts';

    protected $fillable = [
        'facility_id',
        'created_by',
        'title',
        'message',
        'priority',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * Get the user who created this alert
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope: get only active alerts
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            });
    }

    /**
     * Scope: order by priority (critical > medium > low)
     */
    public function scopeByPriority($query)
    {
        return $query->orderByRaw(
            "FIELD(priority, 'critical', 'medium', 'low')"
        );
    }

    /**
     * Check if alert has expired
     */
    public function isExpired(): bool
    {
        if ($this->expires_at === null) {
            return false;
        }
        return $this->expires_at->isPast();
    }

    /**
     * Auto-deactivate if expired (call this when querying)
     */
    public function deactivateIfExpired(): void
    {
        if ($this->isExpired() && $this->is_active) {
            $this->update(['is_active' => false]);
        }
    }
}
