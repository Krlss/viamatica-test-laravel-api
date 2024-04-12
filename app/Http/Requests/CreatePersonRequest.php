<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'names' => 'required|string|max:255',
            'lastnames' => 'required|string|max:255',
            'identification' => [
                'required',
                'string',
                'size:10',
                'regex:/^\d{10}$/',
                function ($attribute, $value, $fail) {
                    if (preg_match('/(\d)\1{3}/', $value)) {
                        $fail('The identification number is invalid.');
                    }
                }
            ],
            'date_birth' => 'required|date|date_format:Y-m-d',
        ];
    }
}
