<?php

namespace App\Rules\Post;

use App\Enums\User\ETypeAdmin;
use App\Models\Admin;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CreatePostCheckPublishedAt implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string|mixed $attribute
     * @param string|mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        /** @var Admin $admin */
        $admin = Auth::user();
        $isSuperAdmin = $admin->type == ETypeAdmin::SuperAdmin;
        if ($isSuperAdmin && !$value) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string|null
     */
    public function message(): string|null
    {
        /** @var string */
        return __('post.validations.published_at.required');
    }
}
