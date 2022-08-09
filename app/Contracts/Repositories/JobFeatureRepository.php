<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface JobFeatureRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface JobFeatureRepository extends RepositoryInterface
{
    /**
     * @param int $id
     *
     * @return array
     */
    public function getAllWithJobId(int $id): array;
}
