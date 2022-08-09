<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\OfficeTypeRepository;

/**
 * This is class of cache
 *
 * @author QuanNV
 */
class OfficeTypeService
{
    /**
     * @param \App\Contracts\Repositories\OfficeTypeRepository $repository
     */
    public function __construct(protected readonly OfficeTypeRepository $repository)
    {
    }

    /**
     * get all office
     *
     * @return mixed
     */
    public function getAll()
    {
        $officesTypes = $this->repository->all();

        return $officesTypes;
    }
}
