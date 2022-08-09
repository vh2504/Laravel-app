<?php

namespace App\Http\Requests\Admin\Collection;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'category_id' => 'required',
            'priority' => 'required|numeric|max:3',
            'image' => 'image|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png,image/jpg|max:2048',
            'summary' => 'required|max:500',
            'icon' => 'image|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png,image/jpg|max:2048',
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
            'name.required' => __('collection.validations.name.required', ['max' => 100]),
            'name.max' => __('collection.validations.name.max'),
            'image.required' => __('collection.validations.image.required'),
            'category_id.required' => __('collection.validations.category.required'),
            'summary.required' => __('collection.validations.summary.required'),
            'summary.max' => __('collection.validations.summary.max', ['max' => 200]),
            'priority.required' => __('collection.validations.priority.required'),
        ];
    }
}
