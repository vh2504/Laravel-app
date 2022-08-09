<?php

namespace App\Http\Requests\Admin\Feature;

use Illuminate\Foundation\Http\FormRequest;

class CreateFeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:20',
            'type_group' => 'required|numeric'
        ];
    }

    /**
     * Get message validate
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('feature.validations.name.required'),
            'name.max' => __('feature.validations.name.max', ['max' => 20]),
            'type_group.required' => __('feature.validations.type_group.required')
        ];
    }
}
