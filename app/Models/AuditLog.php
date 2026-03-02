<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditLog extends Model
{
    protected $table = 'audit_logs';

    protected $fillable = [
        'facility_id',
        'user_id',
        'action',
        'target_model',
        'target_id',
        'changes',
        'description',
    ];

    protected $casts = [
        'changes' => 'json',
    ];

    /**
     * Get the user who performed the action
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the facility where action occurred
     */
    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }

    /**
     * Log an action - static helper
     */
    public static function log(
        int $facilityId,
        int $userId,
        string $action,
        string $targetModel,
        int $targetId,
        ?array $changes = null,
        ?string $description = null
    ): self {
        return self::create([
            'facility_id' => $facilityId,
            'user_id' => $userId,
            'action' => $action,
            'target_model' => $targetModel,
            'target_id' => $targetId,
            'changes' => $changes,
            'description' => $description,
        ]);
    }

    /**
     * Scope: get logs for specific facility
     */
    public function scopeForFacility($query, int $facilityId)
    {
        return $query->where('facility_id', $facilityId);
    }

    /**
     * Scope: get logs by action type
     */
    public function scopeByAction($query, string $action)
    {
        return $query->where('action', $action);
    }

    /**
     * Scope: get logs by target model
     */
    public function scopeByModel($query, string $model)
    {
        return $query->where('target_model', $model);
    }
}
