<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface StationRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface StationRepository extends RepositoryInterface
{
    /**
     * @param int|null $stationId
     * @param int      $limit
     *
     * @return array
     */
    public function getOptions(?int $stationId, int $limit): array;

    /**
     * @param string $lineCode
     * @param string $code
     *
     * @return int|null
     */
    public function getIdByCode(string $lineCode, string $code): ?int;

    /**
     * @param int $id
     *
     * @return array
     */
    public function suggest(int $id): array;
}
