<?php
namespace App\Services\Admin;

use App\Contracts\Repositories\AdminRepository;
use App\Enums\User\ETypeAdmin;
use App\Models\Admin;
use Illuminate\Http\Request;

/**
 * This is class of cache
 */
class AdminService
{
    /**
     * function contructer
     *
     * @param AdminRepository $repository
     */
    public function __construct(
        protected readonly AdminRepository $repository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function search(Request $request)
    {
        $data['admins'] = $this->repository->search([
            'email' => $request->email,
            'orderBy' => $request->orderBy,
            'orderType' => $request->orderType,
        ]);

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $admin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt((string)$request->password),
            'type' => ETypeAdmin::Admin,
        ];

        $this->repository->create($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return array
     */
    public function edit(int $id)
    {
        $data['admin'] = $this->repository->find($id);
        $data['id'] = $id;

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $admin = [
            'name' => $request->name,
        ];

        if (!empty($request->password)) {
            $admin['password'] = bcrypt((string)$request->password);
        }

        $this->repository->update($admin, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return int|bool
     */
    public function destroy(int $id)
    {
        /** @var Admin $admin */
        $admin = $this->repository->find($id);

        if ($admin->isSuperAdmin()) {
            return false;
        }
        
        return $this->repository->delete($id);
    }
}
