<?php

namespace App\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AdminRepository.
 *
 * @package namespace App\Contracts\Repositories;
 * @return LengthAwarePaginator;
 */
interface AdminRepository extends RepositoryInterface
{
    /**
     * Get List and Filter Admin
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator;
}
