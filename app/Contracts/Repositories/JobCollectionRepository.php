<?php

namespace App\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface JobCollectionRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface JobCollectionRepository extends RepositoryInterface
{
    /**
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator;

    /**
     * @return array
     */
    public function getOptions(): array;

    /**
     * get All collection
     *
     * @return Collection
     */
    public function getAll(): Collection;
}
