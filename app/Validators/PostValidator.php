<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PostValidatorValidator.
 *
 * @package namespace App\Validators;
 */
class PostValidator extends LaravelValidator
{
    const RULE_SUPER_ADMIN_CONFIRM = 'superAdminConfirm';
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [],
        ValidatorInterface::RULE_UPDATE => [],
        self::RULE_SUPER_ADMIN_CONFIRM => []
    ];
}
