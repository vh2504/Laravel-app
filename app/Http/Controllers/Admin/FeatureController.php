<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feature\CreateFeatureRequest;
use App\Models\Feature;
use App\Services\Admin\CollectionService;
use App\Services\Admin\FeatureService;
use App\Validators\FeatureValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class FeatureController extends Controller
{
    /**
     * contructor
     *
     * @param FeatureService    $service
     * @param CollectionService $collectionService
     * @param FeatureValidator  $validator
     * @return void
     */
    public function __construct(
        protected readonly FeatureService $service,
        protected readonly CollectionService $collectionService,
        protected readonly FeatureValidator $validator
    ) {
    }

    /**
     * Display a listing of the Feature.
     * @param \Illuminate\Http\Request $request
     * @return View|Factory
     */
    public function index(Request $request): View|Factory
    {
        $dataIndex = $this->service->index($request);
        $features = Arr::get($dataIndex, 'features', []);
        $jobCategories = Arr::get($dataIndex, 'jobCategories', []);
        $listTypeGroup = Arr::get($dataIndex, 'listTypeGroup', []);

        return view('features.index', compact('features', 'jobCategories', 'listTypeGroup'));
    }

    /**
     * Display a creating of the Feature.
     * @return View|Factory
     */
    public function create(): View|Factory
    {
        $collections = $this->collectionService->getAll();
        $dataForm = $this->service->getDataFormFeature();
        $typeGroups = Arr::get($dataForm, 'typeGroups', []);
        $jobCategoryNotInCollections = Arr::get($dataForm, 'jobCategoryNotInCollections', []);

        return view('features.create', compact('collections', 'typeGroups', 'jobCategoryNotInCollections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFeatureRequest $request
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateFeatureRequest $request): Redirector|RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->store($request->all());

            return redirect()->route('admin.features.index')->with('success', __('feature.messages.create-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Display a editing of the Feature.
     * @param Feature $feature
     *
     * @return View|Factory
     */
    public function edit(Feature $feature): View|Factory
    {
        $collections = $this->collectionService->getAll();
        $dataForm = $this->service->getDataFormFeature();
        $typeGroups = Arr::get($dataForm, 'typeGroups', []);
        $jobCategoryNotInCollections = Arr::get($dataForm, 'jobCategoryNotInCollections', []);

        return view('features.edit', compact('feature', 'collections', 'typeGroups', 'jobCategoryNotInCollections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFeatureRequest $request
     * @param Feature              $feature
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CreateFeatureRequest $request, Feature $feature): Redirector|RedirectResponse
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->update($request->all(), $feature);

            return redirect()->route('admin.features.index')->with('success', __('feature.messages.update-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
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

    /**
     * Delete feature
     * @param Feature $feature
     * @return JsonResponse
     * @throws \Throwable
     */
    public function destroy(Feature $feature): JsonResponse
    {
        $data = [
            'status' => 200,
            'message' => __('post.messages.delete-success'),
        ];
        try {
            $this->service->destroy($feature);
        } catch (\Throwable $th) {
            $data = [
                'status' => $th->getCode(),
                'message' => $th->getMessage(),
            ];
        }//end try

        return response()->json($data);
    }
}
