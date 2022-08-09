<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SendMailResetRequest extends FormRequest
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
            'email.required' => __('reset-frontend.validations.email.required'),
            'email.email' => __('reset-frontend.validations.email.required'),
            'email.regex' => __('reset-frontend.validations.email.required'),
        ];
    }
}
