<?php

namespace App\Rules;

use App\Contracts\Rules\BaseRule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CurrentPasswordCheckRule implements BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string           $attribute
     * @param string|int|array $value
     *
     * @return bool
     */
    public function passes(string $attribute, $value): bool
    {
        /** @var User $user */
        $user = auth()->user();
        if (!$user instanceof User) {
            return false;
        }

        return Hash::check((string)$value, (string)$user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return (string)__('The current password field does not match your password');
    }
}
