<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Job as FormRequest;
use App\Models\Job;
use App\Services\Admin\JobService;
use App\Validators\JobValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class JobController extends Controller
{
    /**
     * @param JobService   $service
     * @param JobValidator $validator
     */
    public function __construct(
        protected readonly JobService $service,
        protected readonly JobValidator $validator
    ) {
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view(
            'job.index',
            [
                'models' => $this->service->search($request),
                'service' => $this->service,
                'request' => $request
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('job.create', [
            'service' => $this->service
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest\JobFormRequest $request
     *
     * @return RedirectResponse
     */
    public function store(FormRequest\JobFormRequest $request): RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->store($request);

            return redirect()
                ->route('admin.job.index')
                ->with('success', __('job.messages.created_success'));
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
    public function edit(int $id): View|RedirectResponse
    {
        try {
            /** @var Job $model */
            $model = $this->service->findById($id);
            if (!$model instanceof Job) {
                return redirect()
                    ->route('admin.job.index')
                    ->with('warning', __('job.messages.not_found'));
            }
            $featureGroups = $this->service->getAllFeatureWithJobId($model->id);

            return view('job.edit', [
                'model' => $model,
                'service' => $this->service,
                'featureGroups' => $featureGroups
            ]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormRequest\JobFormRequest $request
     * @param int                        $id
     *
     * @return RedirectResponse
     */
    public function update(FormRequest\JobFormRequest $request, int $id): RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->service->update($request, $id);

            return redirect()
                ->route('admin.job.index')
                ->with('success', __('job.messages.updated_success'));
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
        return response()->json([
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
        return response()->json([
            'status' => $this->service->popular($id)
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function suggestPrefectures(Request $request): JsonResponse
    {
        return response()->json([
            'values' => $this->service->suggestPrefectures((string)$request->q, null)
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function suggestCities(Request $request): JsonResponse
    {
        return response()->json([
            'values' => $this->service->suggestCities((int)$request->q)
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function suggestLine(Request $request): JsonResponse
    {
        return response()->json([
            'results' => $this->service->suggestLine((string)$request->q)
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function suggestStation(Request $request): JsonResponse
    {
        return response()->json([
            'values' => $this->service->suggestStation((int)$request->id)
        ]);
    }
}
