<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PrefectureRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface PrefectureRepository extends RepositoryInterface
{
    /**
     * getPrefectures
     *
     * @return array
     */
    public function getPrefectures(): array;
}
