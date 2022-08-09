<?php

namespace App\Contracts\Rules;

interface BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string           $attribute
     * @param string|int|array $value
     *
     * @return bool
     */
    public function passes(string $attribute, string|int|array $value): bool;

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message();
}
