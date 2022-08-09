<?php

namespace App\Http\Requests\Admin\Post;

use App\Rules\Post\SuperAdminConfirmPublishedAt;
use App\Rules\Post\SuperAdminConfirmReason;
use Illuminate\Foundation\Http\FormRequest;

class SuperAdminConfirmRequest extends FormRequest
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
            'status' => 'required|numeric',
            'reason' => [new SuperAdminConfirmReason((int)$this->status)],
            'published_at' => [new SuperAdminConfirmPublishedAt((int)$this->status)]
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
            'status.required' => __('post.validations.status.required'),
        ];
    }
}
