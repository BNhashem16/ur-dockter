<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SendOtpRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'identifier' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:email,phone'],
        ];
    }

    public function messages(): array
    {
        return [
            'identifier.required' => 'Email or phone number is required.',
            'type.required' => 'OTP type is required.',
            'type.in' => 'OTP type must be either email or phone.',
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
