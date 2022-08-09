<?php

namespace App\Http\Requests\Admin\JobCategory;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:job_categories|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png,image/jpg',
            'feature_id' => 'required|array|min:1',
            'icon' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png,image/jpg',
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
            'name.required' => __('job_category.validations.name.required', ['max' => 100]),
            'name.max' => __('job_category.validations.name.max'),
            'image.required' => __('job_category.validations.image.required'),
            'collection_id.required' => __('job_category.validations.collection_id.required'),
            'feature_id.required' => __('job_category.validations.feature_id.required'),
            'icon.required' => __('job_category.validations.icon.required'),
        ];
    }
}
