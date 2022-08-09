<?php

namespace App\Services\User;

use App\Contracts\Repositories\PasswordResetRepository;
use App\Models\PasswordReset;
use Illuminate\Http\Request;

/**
 * This is class Password Reset Service
 */
class PasswordResetService
{
    /**
     * contructor
     *
     * @param \App\Contracts\Repositories\PasswordResetRepository $repository
     * @return void
     */
    public function __construct(
        protected readonly PasswordResetRepository $repository
    ) {
    }

    /**
     * getPasswordResetByEmail PasswordReset
     *
     * @param string $email
     *
     * @return PasswordReset|null
     */
    public function getPasswordResetByEmail(string $email): PasswordReset|null
    {
        /** @var PasswordReset $passwordReset */
        $passwordReset = $this->repository->getPasswordResetByEmail($email);

        return $passwordReset;
    }

    /**
     * getPasswordResetByToken PasswordReset
     *
     * @param string $token
     *
     * @return PasswordReset|null
     */
    public function getPasswordResetByToken(string $token): PasswordReset|null
    {
        /** @var PasswordReset $passwordReset */
        $passwordReset = $this->repository->getPasswordResetByToken($token);

        return $passwordReset;
    }

    /**
     * createToken PasswordReset
     *
     * @param array $dataRequest
     *
     * @return PasswordReset
     */
    public function createToken(array $dataRequest): PasswordReset
    {
        /** @var PasswordReset $passwordReset */
        $passwordReset = $this->repository->create($dataRequest);

        return $passwordReset;
    }

    /**
     * updateToken PasswordReset
     *
     * @param array  $dataRequest
     * @param string $email
     *
     * @return mixed
     */
    public function updateToken(array $dataRequest, string $email): mixed
    {
        $passwordReset = $this->repository->updateToken($dataRequest, $email);

        return $passwordReset;
    }

    /**
     * Delete by email PasswordReset
     *
     * @param string $email
     *
     * @return int
     */
    public function destroyByEmail(string $email): int
    {
        return $this->repository->destroyPasswordResetByEmail($email);
    }

    /**
     * Delete by token PasswordReset
     *
     * @param string $token
     *
     * @return int
     */
    public function destroyByToken(string $token): int
    {
        return $this->repository->destroyPasswordResetByToken($token);
    }
}
