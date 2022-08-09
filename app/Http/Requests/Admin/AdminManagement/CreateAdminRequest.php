<?php

namespace App\Http\Requests\Admin\AdminManagement;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email'  => 'required|max:50|email|unique:admins',
            'password'  => 'required|max:20|confirmed|min:8|regex:/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/',
            'password_confirmation'  => 'required',
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
            'name.required' => __('admin.msg.name_required'),
            'name.max' => __('admin.msg.name_max'),
            'email.required'  => __('admin.msg.email_required'),
            'email.email'  => __('admin.msg.email_email'),
            'email.unique'  => __('admin.msg.email_unique'),
            'email.max'  => __('admin.msg.email_max'),
            'password.required'  => __('admin.msg.password_required'),
            'password.regex'  => __('admin.msg.password_regex'),
            'password.max'  => __('admin.msg.password_max'),
            'password.confirmed'  => __('admin.msg.password_confirmed'),
            'password.min'  => __('admin.msg.password_min'),
        ];
    }
}
