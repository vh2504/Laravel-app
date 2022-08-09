<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface FeatureJobCategoryRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface FeatureJobCategoryRepository extends RepositoryInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function getOldFeatureIds(int $id): array;
}
