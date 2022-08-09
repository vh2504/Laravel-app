<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\OfficeRepository;
use App\Repositories\Eloquent\OfficeRepositoryEloquent;
use Illuminate\Http\Request;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * This is class of cache
 *
 * @author QuanNV
 */
class OfficeService
{
    /**
     * @param \App\Contracts\Repositories\OfficeRepository $repository
     * @param \App\Services\Admin\OfficeTypeService        $officeTypeService
     */
    public function __construct(
        protected readonly OfficeRepository $repository,
        protected readonly OfficeTypeService $officeTypeService
    ) {
        //..
    }

    /**
     * Display a listing of the resource.
     *
     * @return array<string, mixed>
     */
    public function index()
    {
        $data['offices'] = $this->repository->paginate();

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array<string, mixed>
     */
    public function create()
    {
        $data['offices_types'] = $this->officeTypeService->getAll();

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return void
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return void
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }
}
