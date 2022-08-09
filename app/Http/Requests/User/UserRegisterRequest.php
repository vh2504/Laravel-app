<?php

namespace App\Http\Requests\User;

use App\Enums\User\EStepRegisterUser;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
        $rules = [];
        switch ($this->step) {
            case EStepRegisterUser::Step1->name:
                $rules = [
                    'email' =>
                        'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/',
                    'password' => 'required|confirmed|min:8',
                    'password_confirmation' => 'required|min:8',
                ];
                break;
            case EStepRegisterUser::Step2->name:
                $rules = [
                    'first_name' => 'required|max:50',
                    'last_name' => 'required|max:50',
                    'first_name_hira' => 'required|max:50',
                    'last_name_hira' => 'required|max:50',
                    'birthday_year' => 'required',
                    'birthday_month' => 'required',
                    'birthday_day' => 'required',
                    'gender' => 'required',
                    'zipcode' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:7|max:7',
                    'prefecture' => 'required',
                    'city' => 'required',
                    'number_phone' => 'required|regex:/^0([0-9\s\-\+\(\)]*)$/|min:10|max:11',
                    'job_situation' => 'required',
                ];
                break;
            default:
                break;
        }

        return $rules;
    }

    /**
     * Get message validate
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        $messages = [];
        switch ($this->step) {
            case EStepRegisterUser::Step1->name:
                $messages = [
                    'email.required' => __('register-frontend.validations.email.required'),
                    'email.regex' => __('register-frontend.validations.email.regex'),
                    'password.required' => __('register-frontend.validations.password.required'),
                    'password.min' => __('register-frontend.validations.password.min'),
                    'password.confirmed' => __('register-frontend.validations.password.confirmed'),
                    'password_confirmation.required' =>
                        __('register-frontend.validations.password_confirmation.required'),
                    'password_confirmation.min' => __('register-frontend.validations.password.min'),
                ];
                break;
            case EStepRegisterUser::Step2->name:
                $messages = [
                    'first_name.required' => __('register-frontend.validations.fullname.fn_required'),
                    'first_name.max' => __('register-frontend.validations.fullname.fn_max'),
                    'last_name.required' => __('register-frontend.validations.fullname.ln_required'),
                    'last_name.max' => __('register-frontend.validations.fullname.ln_max'),
                    'first_name_hira.required' => __('register-frontend.validations.fullname_hira.fn_required'),
                    'first_name_hira.max' => __('register-frontend.validations.fullname_hira.fn_max'),
                    'last_name_hira.required' => __('register-frontend.validations.fullname_hira.ln_required'),
                    'last_name_hira.max' => __('register-frontend.validations.fullname_hira.ln_max'),
                    'birthday_year.required' => __('register-frontend.validations.birthday.required'),
                    'birthday_month.required' => __('register-frontend.validations.birthday.required'),
                    'birthday_day.required' => __('register-frontend.validations.birthday.required'),
                    'gender.required' => __('register-frontend.validations.gender.required'),
                    'zipcode.regex' => __('register-frontend.validations.zipcode.format'),
                    'zipcode.min' => __('register-frontend.validations.zipcode.format_unique'),
                    'zipcode.max' => __('register-frontend.validations.zipcode.format_unique'),
                    'prefecture.required' => __('register-frontend.validations.address.prefecture_required'),
                    'city.required' => __('register-frontend.validations.address.city_required'),
                    'number_phone.required' => __('register-frontend.validations.number_phone.required'),
                    'number_phone.regex' => __('register-frontend.validations.number_phone.format'),
                    'number_phone.min' => __('register-frontend.validations.number_phone.format'),
                    'number_phone.max' => __('register-frontend.validations.number_phone.format'),
                    'job_situation.required' => __('register-frontend.validations.job_situation.required'),
                ];
                break;
            default:
                break;
        }
        return $messages;
    }
}
