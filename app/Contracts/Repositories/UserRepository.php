<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    /**
     * Get List and Filter User
     *
     * @param array $filter
     * @param bool  $isExport
     * @return LengthAwarePaginator
     */
    public function search(array $filter, bool $isExport = false): LengthAwarePaginator|Collection;
    
    /**
     * getUserByEmail
     *
     * @param string $email
     *
     * @return mixed
     */
    public function getUserByEmail(string $email);

    /**
     * updatePassword
     *
     * @param array  $attr
     * @param string $email
     *
     * @return mixed
     */
    public function updatePassword(array $attr, string $email);
}
