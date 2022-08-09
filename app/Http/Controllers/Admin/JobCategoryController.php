<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobCategory as FormRequest;
use App\Models\JobCategory;
use App\Services\Admin\JobCategoryService;
use App\Validators\JobCategoryValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class JobCategoryController extends Controller
{
    /**
     * @param JobCategoryService   $service
     * @param JobCategoryValidator $validator
     */
    public function __construct(
        protected readonly JobCategoryService $service,
        protected readonly JobCategoryValidator $validator
    ) {
        //...
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view(
            'job-category.index',
            [
                'models' => $this->service->search($request),
                'service' => $this->service
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('job-category.create', [
            'service' => $this->service
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest\CreateRequest $request
     *
     * @return RedirectResponse
     */
    public function store(FormRequest\CreateRequest $request): RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->store($request);

            return redirect()
                ->route('admin.job-categories.index')
                ->with('success', __('job_category.messages.created_success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return RedirectResponse|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        try {
            $model = $this->service->findById($id);
            if (!$model instanceof JobCategory) {
                return redirect()
                    ->route('admin.job-categories.index')
                    ->with('warning', __('job_category.messages.not_found'));
            }

            return view('job-category.edit', [
                'model' => $model,
                'service' => $this->service,
            ]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormRequest\UpdateRequest $request
     * @param int                       $id
     *
     * @return RedirectResponse
     *
     */
    public function update(FormRequest\UpdateRequest $request, int $id): RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->service->update($request, $id);

            return redirect()
                ->route('admin.job-categories.index')
                ->with('success', __('job_category.messages.updated_success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        return \response()->json([
            'status' => $this->service->delete($id)
        ]);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function popular(int $id): JsonResponse
    {
        return \response()->json([
            'status' => $this->service->popular($id)
        ]);
    }
}
