<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array<string, string>
     */
    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ];
    }

    /**
     * Get message validate
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'password.required' => __('reset-frontend.validations.password.required'),
            'password.confirmed' => __('reset-frontend.validations.password.confirmed'),
            'password.min' => __('reset-frontend.validations.password.min'),
            'password_confirmation.required' => __('reset-frontend.validations.password-confirmation.required'),
            'password_confirmation.min' => __('reset-frontend.validations.password.min'),
        ];
    }
}
