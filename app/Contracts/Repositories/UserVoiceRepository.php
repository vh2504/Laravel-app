<?php

namespace App\Contracts\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserVoiceRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface UserVoiceRepository extends RepositoryInterface
{
    /**
     * Get List and Filter UserVoice
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator;

    /**
     * Get List and Filter UserVoice
     *
     * @return integer
     */
    public function getCountPopular(): int;
}
