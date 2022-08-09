<?php

namespace App\Contracts\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NoticeRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface NoticeRepository extends RepositoryInterface
{
    /**
     * Get List and Filter Feature
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator;
}
