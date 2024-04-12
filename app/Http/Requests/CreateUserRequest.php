<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => [
                'required',
                'string',
                'max:20',
                'min:8',
                'regex:/^(?=.*\d)(?=.*[A-Z])(?!.*[\W_])(?!.*(\d)\1{3})[a-zA-Z0-9]+$/',
                'unique:users'
            ],
            'mail' => 'required|string|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*\d)(?=.*[A-Z])(?=.*[\W_])(?!.*\s).*$/'
            ],
            'person_id' => 'required|integer|exists:persons,id',
        ];
    }
}
