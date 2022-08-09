<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostalCodeRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface PostalCodeRepository extends RepositoryInterface
{
    /**
     * @param string   $postalCode
     * @param int|null $cityId
     *
     * @return array
     */
    public function suggestPrefectures(string $postalCode, ?int $cityId): array;
}
