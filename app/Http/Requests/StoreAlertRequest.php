<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlertRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only admins can create alerts
        return auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'priority' => ['required', 'in:low,medium,critical'],
            'expires_at' => ['nullable', 'date_format:Y-m-d H:i', 'after:now'],
        ];
    }

    public function messages(): array
    {
        return [
            'expires_at.after' => 'Expiry time must be in the future.',
        ];
    }
}
