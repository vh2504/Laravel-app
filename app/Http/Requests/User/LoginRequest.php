<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/',
            'password' => 'required|min:8',
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
            'email.required' => __('login-frontend.validations.email.required'),
            'password.required' => __('login-frontend.validations.password.required'),
            'email.email' => __('login-frontend.validations.email.email'),
            'email.regex' => __('login-frontend.validations.email.email'),
            'password.min' => __('login-frontend.validations.password.min', ['min' => 8]),
        ];
    }
}
