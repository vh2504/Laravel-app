<?php

namespace App\Http\Requests\Admin\Notice;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoticeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
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
            'title' => 'required|max:200',
            'content' => 'required',
            'published_at' => 'required'
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
            'title.required' => __('notice.validations.title.required'),
            'title.max' => __('notice.validations.title.max', ['max' => 200]),
            'published_at.required' => __('notice.validations.published_at.required'),
            'content.required' => __('notice.validations.content.required')
        ];
    }
}
