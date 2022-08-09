<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CityRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface CityRepository extends RepositoryInterface
{
    /**
     * @param int $id
     *
     * @return array
     */
    public function suggestCities(int $id): array;
}
