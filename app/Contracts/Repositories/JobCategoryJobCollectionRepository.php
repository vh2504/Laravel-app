<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface JobCategoryJobCollectionRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface JobCategoryJobCollectionRepository extends RepositoryInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function getCategoryIds(int $id): array;

    /**
     * @param array $id
     * @param int   $limit
     * @return Collection
     */
    public function getGroupCategories(array $id, int $limit): Collection;

    /**
     * @param array $id
     * @param int   $limit
     * @return Collection
     */
    public function getGroupCollections(array $id, int $limit): Collection;

    /**
     * @param int   $catId
     * @param array $collectionId
     * @return int
     */
    public function deleteByJobCategories(int $catId, array $collectionId): int;
}
