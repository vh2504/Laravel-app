<?php

namespace App\Contracts\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface PostRepository extends RepositoryInterface
{
    /**
     * Get List and Filter Post
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator;

    /**
     * Get List and Filter Post
     *
     * @return integer
     */
    public function getCountPopular(): int;
}
