<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'file' => 'required|image|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png,image/jpg|max:2048',
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
            'file.required' => __('post.validations.image.required'),
        ];
    }
}
