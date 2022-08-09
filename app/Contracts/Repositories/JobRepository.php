<?php

namespace App\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface JobRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface JobRepository extends RepositoryInterface
{
    /**
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator;
}
