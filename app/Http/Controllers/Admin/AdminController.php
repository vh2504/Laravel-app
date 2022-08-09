<?php

namespace App\Http\Controllers\Admin;

use App\Enums\User\ETypeAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminManagement\CreateAdminRequest;
use App\Http\Requests\Admin\AdminManagement\EditAdminRequest;
use App\Models\Admin;
use App\Services\Admin\AdminService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * function contructer
     *
     * @param AdminService $adminService
     */
    public function __construct(
        protected readonly AdminService $adminService
    ) {
        //
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function search(Request $request): View|Factory|RedirectResponse
    {
        /** @var Admin $admin */
        $admin = auth()->user();
        if (!$admin->isSuperAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        $data = $this->adminService->search($request);

        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function create(): View|Factory|RedirectResponse
    {
        /** @var Admin $admin */
        $admin = auth()->user();
        if (!$admin->isSuperAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAdminRequest $request): RedirectResponse
    {
        /** @var Admin $admin */
        $admin = auth()->user();
        if (!$admin->isSuperAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        $this->adminService->store($request);

        return redirect()->route('admin.admin.management.index')->withSuccess(__('admin.message.create-success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function edit(int $id): View|Factory|RedirectResponse
    {
        /** @var Admin $admin */
        $admin = auth()->user();
        if (!($admin->isSuperAdmin() || $admin->isMyself($id))) {
            return redirect()->route('admin.dashboard');
        }

        $data = $this->adminService->edit($id);

        return view('admin.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditAdminRequest $request
     * @param int              $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditAdminRequest $request, int $id): RedirectResponse
    {
        /** @var Admin $admin */
        $admin = auth()->user();
        if (!($admin->isSuperAdmin() || $admin->isMyself($id))) {
            return redirect()->route('admin.dashboard');
        }

        $this->adminService->update($request, $id);
        return redirect()->route('admin.admin.management.index')->withSuccess(__('admin.message.update-success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): JsonResponse|RedirectResponse
    {
        /** @var Admin $admin */
        $admin = auth()->user();
        if (!$admin->isSuperAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return \response()->json([
            'status' => $this->adminService->destroy($id)
        ]);
    }
}
