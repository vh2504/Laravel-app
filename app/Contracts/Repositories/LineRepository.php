<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LineRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface LineRepository extends RepositoryInterface
{
    /**
     * @param string $code
     *
     * @return int|null
     */
    public function getIdByCode(string $code): ?int;

    /**
     * @param int|null $lineId
     * @param int      $limit
     *
     * @return array
     */
    public function getOptions(?int $lineId, int $limit): array;

    /**
     * @param string $q
     *
     * @return array
     */
    public function suggest(string $q): array;
}
