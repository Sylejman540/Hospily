<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Admins and clinicians can schedule appointments
        return auth()->user()->isAdmin() || auth()->user()->isClinician();
    }

    public function rules(): array
    {
        return [
            'patient_id' => ['required', 'integer', 'exists:patients,id'],
            'clinician_id' => ['required', 'integer', 'exists:users,id'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'scheduled_at' => ['required', 'date_format:Y-m-d H:i', 'after:now'],
            'procedure_type' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:confirmed,urgent,pending,cancelled,completed'],
            'notes' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'scheduled_at.after' => 'Appointment must be scheduled for a future time.',
            'patient_id.exists' => 'Patient does not exist or does not belong to your facility.',
            'clinician_id.exists' => 'Clinician does not exist or does not belong to your facility.',
            'department_id.exists' => 'Department does not exist or does not belong to your facility.',
        ];
    }
}
