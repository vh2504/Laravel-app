<?php

namespace App\Rules\Post;

use App\Enums\Post\EPostStatus;
use App\Enums\User\ETypeAdmin;
use App\Models\Admin;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class SuperAdminConfirmReason implements Rule
{
    /**
     * Create a new rule instance.
     * @param int $status
     * @return void
     */
    public function __construct(private int $status)
    {
        $this->status = $status;
    }

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
        if ($isSuperAdmin && !$value && $this->status == EPostStatus::Rejected->value) {
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
        return __('post.validations.reason.required');
    }
}
