<?php

namespace App\Http\Requests\Admin\Collection;

use App\Rules\Post\CreatePostCheckPublishedAt;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|unique:job_collections|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png,image/jpg|max:2048',
            'category_id' => 'required',
            'priority' => 'required|numeric|max:3',
            'summary' => 'required|max:500',
            'icon' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png,image/jpg|max:2048'
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
            'icon.required' => __('collection.validations.icon.required'),
        ];
    }
}
