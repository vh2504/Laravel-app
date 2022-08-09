<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\Admin\Collection as FormRequest;
use App\Models\JobCollection;
use App\Services\Admin\CollectionService;
use App\Validators\JobCollectionValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class CollectionController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class CollectionController extends Controller
{
    /**
     * JobCollectionsController constructor.
     *
     * @param CollectionService      $service
     * @param JobCollectionValidator $validator
     */
    public function __construct(
        protected readonly CollectionService $service,
        protected readonly JobCollectionValidator $validator
    ) {
        //..
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $collections = $this->service->search($request);

        $ids = $collections->pluck('id')->toArray();
        $groups = $this->service->getGroupCategoryLabels($ids, 5);

        return view('collection.index', compact('collections', 'request', 'groups'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $listOptions = $this->service->getCategoryOptions();

        return view('collection.create', compact('listOptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest\CreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest\CreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->store($request);

            return redirect()->route('admin.collection.index')->with('success', 'Collection created success.');
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        try {
            $collection = $this->service->findById($id);
            if (!$collection instanceof JobCollection) {
                return redirect()->route('admin.collection.index')->with('warning', 'Collection not found.');
            }

            $listOptions = $this->service->getCategoryOptions();
            $selected = $this->service->getCategorySelectedOptions((int)$collection->id);

            return view('collection.edit', compact('collection', 'listOptions', 'selected'));
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
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function update(FormRequest\UpdateRequest $request, int $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->service->update($request, $id);

            return redirect()->route('admin.collection.index')->with('success', 'Collection updated success.');
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
}
