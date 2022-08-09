<?php

namespace App\Contracts\Service;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface BaseService
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator;

    /**
     * @param Request $request
     *
     * @return Model|null
     */
    public function store(Request $request): ?Model;

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return Model|null
     */
    public function update(Request $request, int $id): ?Model;

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @param int $id
     *
     * @return Model|null
     */
    public function findById(int $id): ?Model;
}
