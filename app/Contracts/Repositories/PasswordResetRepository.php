<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PasswordResetRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface PasswordResetRepository extends RepositoryInterface
{
    /**
     * getPasswordResetByEmail
     *
     * @param string $email
     *
     * @return mixed
     */
    public function getPasswordResetByEmail(string $email);

    /**
     * getPasswordResetByToken
     *
     * @param string $token
     *
     * @return mixed
     */
    public function getPasswordResetByToken(string $token);

    /**
     * updateToken
     *
     * @param array  $attr
     * @param string $email
     *
     * @return mixed
     */
    public function updateToken(array $attr, string $email);

    /**
     * destroyPasswordResetByEmail
     *
     * @param string $email
     *
     * @return int
     */
    public function destroyPasswordResetByEmail(string $email);

    /**
     * destroyPasswordResetByToken
     *
     * @param string $token
     *
     * @return int
     */
    public function destroyPasswordResetByToken(string $token);
}
