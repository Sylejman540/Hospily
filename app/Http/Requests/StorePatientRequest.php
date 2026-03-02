<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Clinicians and admins can create patients
        return auth()->user()->isAdmin() || auth()->user()->isClinician();
    }

    public function rules(): array
    {
        return [
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'before:today'],
            'gender' => ['nullable', 'in:male,female,other'],
            'care_status' => ['required', 'in:outpatient,in-care,critical,recovery'],
            'admitted_at' => ['nullable', 'date_format:Y-m-d H:i'],
        ];
    }

    public function messages(): array
    {
        return [
            'department_id.exists' => 'The selected department does not exist or does not belong to your facility.',
            'dob.before' => 'Date of birth must be in the past.',
        ];
    }
}
