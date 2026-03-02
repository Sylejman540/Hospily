<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display appointments with optional filtering
     * 
     * Query parameters:
     * - start_date: Filter appointments from this date (Y-m-d format)
     * - end_date: Filter appointments until this date (Y-m-d format)
     * - status: Filter by status (confirmed, urgent, pending, cancelled, completed)
     * - clinician_id: Filter by clinician (only own if not admin)
     * - per_page: Results per page (default: 15)
     */
   public function index(Request $request)
    {
        $query = Appointment::with(['patient', 'clinician', 'department']);

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->dateRange($request->start_date, $request->end_date);
        }

        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        if (!auth()->user()->isAdmin()) {
            $query->forClinician(auth()->id());
        }

        $appointments = $query->orderBy('scheduled_at')->paginate(15);

        return view('dashboard.appointment', compact('appointments'));
    }

    /**
     * Show form for creating an appointment (non-API)
     */
    public function create()
    {
        return response()->json(['message' => 'Use POST /appointments to create']);
    }

    /**
     * Store a newly created appointment
     */
    public function store(StoreAppointmentRequest $request)
    {
        // Verify clinician belongs to same facility
        $clinician = \App\Models\User::find($request->clinician_id);
        if ($clinician->facility_id !== auth()->user()->facility_id) {
            return response()->json(['message' => 'Clinician does not belong to your facility'], 422);
        }

        $appointment = Appointment::create([
            'facility_id' => auth()->user()->facility_id,
            'patient_id' => $request->patient_id,
            'clinician_id' => $request->clinician_id,
            'department_id' => $request->department_id,
            'scheduled_at' => $request->scheduled_at,
            'procedure_type' => $request->procedure_type,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return response()->json($appointment->load('patient', 'clinician', 'department'), 201);
    }

    /**
     * Display the specified appointment
     */
    public function show(Appointment $appointment)
    {
        $this->authorize('view', $appointment);

        return response()->json($appointment->load('patient', 'clinician', 'department'));
    }

    /**
     * Show form for editing the appointment (non-API)
     */
    public function edit(Appointment $appointment)
    {
        $this->authorize('view', $appointment);
        return response()->json(['message' => 'Use PATCH /appointments/{id} to update']);
    }

    /**
     * Update the specified appointment
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $this->authorize('update', $appointment);

        // Verify clinician belongs to same facility
        $clinician = \App\Models\User::find($request->clinician_id);
        if ($clinician->facility_id !== auth()->user()->facility_id) {
            return response()->json(['message' => 'Clinician does not belong to your facility'], 422);
        }

        $appointment->update([
            'patient_id' => $request->patient_id,
            'clinician_id' => $request->clinician_id,
            'department_id' => $request->department_id,
            'scheduled_at' => $request->scheduled_at,
            'procedure_type' => $request->procedure_type,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return response()->json($appointment->load('patient', 'clinician', 'department'));
    }

    /**
     * Update appointment status only
     * 
     * Request body:
     * {
     *   "status": "confirmed|urgent|pending|cancelled|completed"
     * }
     */
    public function updateStatus(Appointment $appointment, Request $request)
    {
        $this->authorize('update', $appointment);

        $validated = $request->validate([
            'status' => ['required', 'in:confirmed,urgent,pending,cancelled,completed'],
        ]);

        $oldStatus = $appointment->status;
        
        $appointment->update(['status' => $validated['status']]);

        // Log the status change
        \App\Models\AuditLog::log(
            facilityId: auth()->user()->facility_id,
            userId: auth()->id(),
            action: 'status_change',
            targetModel: 'Appointment',
            targetId: $appointment->id,
            changes: [
                'status' => ['from' => $oldStatus, 'to' => $validated['status']],
            ],
            description: "Appointment #{$appointment->id} status changed from {$oldStatus} to {$validated['status']}"
        );

        return response()->json(['message' => 'Status updated successfully', 'appointment' => $appointment]);
    }

    /**
     * Delete the specified appointment
     */
    public function destroy(Appointment $appointment)
    {
        $this->authorize('delete', $appointment);

        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
