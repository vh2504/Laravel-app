<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\NoticeRepository;
use App\Models\Notice;
use Illuminate\Http\Request;

/**
 * This is class Notice Service
 */
class NoticeService
{
    /**
     * contructor
     *
     * @param \App\Contracts\Repositories\NoticeRepository $repository
     * @return void
     */
    public function __construct(
        protected readonly NoticeRepository $repository
    ) {
    }

    /**
     * Display a listing of the Notice.
     * @param \Illuminate\Http\Request $request
     *
     * @return array<mixed>
     */
    public function index(Request $request): array
    {
        $notices = $this->repository->search($request->all());

        return compact('notices');
    }

    /**
     * Store Notice
     *
     * @param array $dataRequest
     *
     * @return Notice
     */
    public function store(array $dataRequest): Notice
    {
        /** @var Notice $notice */
        $notice = $this->repository->create($dataRequest);

        return $notice;
    }

    /**
     * Update Notice
     *
     * @param array  $dataRequest
     * @param Notice $notice
     *
     * @return Notice
     */
    public function update(array $dataRequest, Notice $notice): Notice
    {
        $notice->update($dataRequest);

        return $notice;
    }

    /**
     * Delete Notice
     * @param Notice $notice
     *
     * @return bool|null
     */
    public function destroy(Notice $notice): bool|null
    {
        return $notice->delete();
    }
}
