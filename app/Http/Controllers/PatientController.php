<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\AuditLog;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display all patients for the authenticated user's facility
     * 
     * Query parameters:
     * - per_page: Results per page (default: 15)
     */
    public function index()
    {
        $perPage = request()->input('per_page', 15);

        $patients = Patient::with('department')
            ->orderBy('last_name')
            ->paginate($perPage);

        return view('dashboard.patient', compact('patients'));
    }
    /**
     * Show form for creating a patient (non-API)
     */
    public function create()
    {
        return response()->json(['message' => 'Use POST /patients to create']);
    }

    /**
     * Store a newly created patient
     * MRN is auto-generated inside a transaction to ensure uniqueness per facility
     */
    public function store(StorePatientRequest $request)
    {
        $patient = DB::transaction(function () use ($request) {
            // Generate MRN inside transaction for atomicity
            $mrn = Patient::generateMrn(auth()->user()->facility_id);

            return Patient::create([
                'facility_id' => auth()->user()->facility_id,
                'department_id' => $request->department_id,
                'mrn' => $mrn,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'care_status' => $request->care_status,
                'admitted_at' => $request->admitted_at,
            ]);
        });

        return response()->json($patient, 201);
    }

    /**
     * Display the specified patient
     */
    public function show(Patient $patient)
    {
        $this->authorize('view', $patient);

        return response()->json($patient->load('department', 'appointments'));
    }

    /**
     * Show form for editing the patient (non-API)
     */
    public function edit(Patient $patient)
    {
        $this->authorize('view', $patient);
        return response()->json(['message' => 'Use PATCH /patients/{id} to update']);
    }

    /**
     * Update the specified patient
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $this->authorize('update', $patient);

        $patient->update([
            'department_id' => $request->department_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'care_status' => $request->care_status,
            'admitted_at' => $request->admitted_at,
        ]);

        return response()->json($patient);
    }

    /**
     * Discharge a patient
     */
    public function discharge(Patient $patient)
    {
        $this->authorize('update', $patient);

        if ($patient->isDischarged()) {
            return response()->json(['message' => 'Patient is already discharged'], 422);
        }

        $oldStatus = $patient->care_status;
        
        $patient->update([
            'care_status' => 'outpatient',
            'discharged_at' => now(),
        ]);

        // Log the discharge action
        AuditLog::log(
            facilityId: auth()->user()->facility_id,
            userId: auth()->id(),
            action: 'discharge',
            targetModel: 'Patient',
            targetId: $patient->id,
            changes: [
                'care_status' => ['from' => $oldStatus, 'to' => 'outpatient'],
                'discharged_at' => ['from' => null, 'to' => $patient->discharged_at],
            ],
            description: "Patient {$patient->full_name} (MRN: {$patient->mrn}) discharged"
        );

        return response()->json(['message' => 'Patient discharged successfully', 'patient' => $patient]);
    }

    /**
     * Delete the specified patient
     */
    public function destroy(Patient $patient)
    {
        $this->authorize('delete', $patient);

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully']);
    }
}

