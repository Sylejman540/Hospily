<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:departments,name,NULL,id,facility_id,' . auth()->user()->facility_id],
            'total_beds' => ['required', 'integer', 'min:1', 'max:999'],
            'color_theme' => ['nullable', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'A department with this name already exists in your facility.',
        ];
    }
}
