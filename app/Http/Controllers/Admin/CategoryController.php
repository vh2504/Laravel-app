<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category as FormRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use App\Validators\CategoryValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class CategoryController extends Controller
{
    /**
     * @param CategoryService   $service
     * @param CategoryValidator $validator
     */
    public function __construct(
        protected readonly CategoryService $service,
        protected readonly CategoryValidator $validator
    ) {
    }

    /**
     * Display a listing of the Category.
     * @param Request $request
     * @return View|Factory
     */
    public function index(Request $request): View|Factory
    {
        $dataIndex = $this->service->index($request);
        $categories = Arr::get($dataIndex, 'categories', []);

        return view('categories.index', compact('categories'));
    }

    /**
     * Display a creating of the Category.
     * @return View|Factory
     */
    public function create(): View|Factory
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest\CreateCategoryRequest $request
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(FormRequest\CreateCategoryRequest $request): Redirector|RedirectResponse
    {
        try {
            $data = $request->all();
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->service->store($data);

            return redirect()->route('admin.categories.index')->with('success', __('category.messages.create-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Display a creating of the Category.
     * @param Category $category
     * @return View|Factory|RedirectResponse
     * @throws \Throwable
     */
    public function edit(Category $category): View|Factory|RedirectResponse
    {
        try {
            return view('categories.edit', compact('category'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }//end try
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest\CreateCategoryRequest $request
     * @param Category                          $category
     *
     * @return Redirector|RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(FormRequest\CreateCategoryRequest $request, Category $category): Redirector|RedirectResponse
    {
        try {
            $data = $request->all();
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->service->update($data, $category);

            return redirect()
                ->route('admin.categories.index', $category->id)
                ->with('success', __('category.messages.update-success'));
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }//end try
    }

    /**
     * Delete category
     * @param Category $category
     * @return JsonResponse
     * @throws \Throwable
     */
    public function destroy(Category $category): JsonResponse
    {
        $data = [
            'status' => 200,
            'message' => __('category.messages.delete-success'),
        ];
        try {
            $this->service->destroy($category);
        } catch (\Throwable $th) {
            $data = [
                'status' => $th->getCode(),
                'message' => $th->getMessage(),
            ];
        }//end try

        return response()->json($data);
    }
}
