<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'account_type' => ['required', 'string', 'in:business,doctor,medical_center,nurse,medical_lab,pharmacy'],
            'group_name' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'phone_country_code' => ['required', 'string', 'max:10'],
            'phone_number' => ['required', 'string', 'max:20'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'state_id' => ['required', 'integer', 'exists:states,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'email_code' => ['required', 'string', 'size:6'],
            'phone_code' => ['required', 'string', 'size:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'account_type.in' => 'Account type must be one of: business, doctor, medical_center, nurse, medical_lab, pharmacy.',
            'email.unique' => 'This email address is already registered.',
            'country_id.exists' => 'The selected country is invalid.',
            'state_id.exists' => 'The selected state/province is invalid.',
            'city_id.exists' => 'The selected city is invalid.',
            'email_code.required' => 'Email verification code is required.',
            'email_code.size' => 'Email verification code must be 6 digits.',
            'phone_code.required' => 'Phone verification code is required.',
            'phone_code.size' => 'Phone verification code must be 6 digits.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'data' => $validator->errors(),
            'message' => 'Validation failed.',
        ], 422));
    }
}
