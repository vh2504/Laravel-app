<?php

namespace App\Http\Requests\Admin\Post;

use App\Rules\Post\CreatePostCheckPublishedAt;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'image' => 'required',
            'category_id' => 'required',
            'summary' => 'required|max:200',
            'content' => 'required',
            'published_at' => [new CreatePostCheckPublishedAt()]
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
            'title.required' => __('post.validations.title.required', ['max' => 100]),
            'image.required' => __('post.validations.image.required'),
            'category_id.required' => __('post.validations.category.required'),
            'summary.required' => __('post.validations.summary.required'),
            'content.required' => __('post.validations.content.required'),
            'title.max' => __('post.validations.title.max'),
            'summary.max' => __('post.validations.summary.max', ['max' => 200]),
            'content.max' => __('post.validations.content.max', ['max' => 5000]),
        ];
    }
}
