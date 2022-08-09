<?php

namespace App\Contracts\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface FeatureRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface FeatureRepository extends RepositoryInterface
{
    /**
     * Get List and Filter Feature
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator;

    /**
     * @param int $limit
     * @return array
     */
    public function getGroupList(int $limit = 1000): array;

    /**
     * @param int $type
     *
     * @return array
     */
    public function getListTypeOptions(int $type): array;
}
