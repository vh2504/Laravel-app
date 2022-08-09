<?php

namespace App\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface JobCategoryRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface JobCategoryRepository extends RepositoryInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator;

    /**
     * @param int $chunkNumber
     *
     * @return array
     */
    public function getOptions(int $chunkNumber = 6): array;

    /**
     * get Job category not include collection
     * @return Collection
     */
    public function getNotInCollection(): Collection;
}
