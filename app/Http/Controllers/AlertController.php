<?php

namespace App\Http\Controllers;

use App\Models\HandoverAlert;
use App\Http\Requests\StoreAlertRequest;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index(Request $request)
    {
        $query = HandoverAlert::active();

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $perPage = $request->input('per_page', 15);
        $alerts = $query->byPriority()->paginate($perPage);

        $alerts->transform(function ($alert) {
            $alert->deactivateIfExpired();
            return $alert;
        });

        return response()->json($alerts);
    }

    public function store(StoreAlertRequest $request)
    {
        $alert = HandoverAlert::create([
            'facility_id' => auth()->user()->facility_id,
            'created_by' => auth()->id(),
            'title' => $request->title,
            'message' => $request->message,
            'priority' => $request->priority,
            'expires_at' => $request->expires_at,
            'is_active' => true,
        ]);

        // Log alert creation
        \App\Models\AuditLog::log(
            facilityId: auth()->user()->facility_id,
            userId: auth()->id(),
            action: 'alert_create',
            targetModel: 'HandoverAlert',
            targetId: $alert->id,
            changes: [
                'priority' => $request->priority,
                'expires_at' => $request->expires_at,
            ],
            description: "Alert created: {$alert->title}"
        );

        return response()->json($alert, 201);
    }

    /**
     * Display a single alert
     */
    public function show(HandoverAlert $alert)
    {
        $this->authorize('view', $alert);

        $alert->deactivateIfExpired();

        return response()->json($alert);
    }

    /**
     * Delete (deactivate) an alert
     * Only admins can delete alerts
     */
    public function destroy(HandoverAlert $alert)
    {
        $this->authorize('delete', $alert);

        $alert->update(['is_active' => false]);

        return response()->json(['message' => 'Alert deactivated successfully']);
    }
}
