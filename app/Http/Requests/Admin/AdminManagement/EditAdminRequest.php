<?php

namespace App\Http\Requests\Admin\AdminManagement;

use App\Enums\User\ETypeAdmin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        $validates =  [
            'name' => 'required|max:50',
        ];

        if (!empty($request->password) || !empty($request->password)) {
            $validates['password'] = 'required|max:20|confirmed|min:8|regex:/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/';
            $validates['password_confirmation'] = 'required';

            if (isset(auth()->user()->id) && auth()->user()->id == $request->id) {
                $validates['old_password'] = 'required';
            }
        }

        return $validates;
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
            'password.required'  => __('admin.msg.password_required'),
            'password.max'  => __('admin.msg.password_max'),
            'password.confirmed'  => __('admin.msg.password_confirmed'),
            'password.min'  => __('admin.msg.password_min'),
        ];
    }
}
