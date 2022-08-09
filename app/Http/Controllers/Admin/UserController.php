<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * function contructer
     * @param UserService $userService
     */
    public function __construct(
        protected readonly UserService $userService
    ) {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request): View|Factory
    {
        $data = $this->userService->search($request);

        return view('user.index', $data);
    }

    /**
     * Export CSV
     *
     * @param Request $request
     * @return null
     */
    public function export(Request $request)
    {
        return $this->userService->export($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(int $id): View|Factory
    {
        $data = $this->userService->show($id);

        return view('user.detail', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(int $id, int $status): JsonResponse
    {
        return \response()->json($this->userService->changeStatus($id, $status));
    }
}
