<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\CategoryRepository;
use App\Helpers\Common;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * This is class Category Service
 */
class CategoryService
{
    /**
     * contructor
     *
     * @param \App\Contracts\Repositories\CategoryRepository $repository
     * @return void
     */
    public function __construct(
        protected readonly CategoryRepository $repository
    ) {
    }

    /**
     * Display a listing of the Category.
     * @param \Illuminate\Http\Request $request
     * @return array<mixed>
     */
    public function index(Request $request): array
    {
        $categories = $this->repository->search([
            'name' => $request->name,
        ]);

        return compact('categories');
    }

    /**
     * Store Category
     *
     * @param array $dataRequest
     *
     * @return Category
     */
    public function store(array $dataRequest): Category
    {
        $dataRequest['slug'] = Common::convertStr($dataRequest['name']);

        /** @var Category $category */
        $category = $this->repository->create($dataRequest);

        return $category;
    }

    /**
     * update Category
     *
     * @param array    $dataRequest
     * @param Category $category
     * @return Category
     */
    public function update(array $dataRequest, Category $category): Category
    {
        $dataRequest['slug'] = Common::convertStr($dataRequest['name']);

        /** @var Category $category */
        $category->update($dataRequest);

        return $category;
    }

    /**
     * Delete category
     * @param Category $category
     *
     * @return boolean|null
     */
    public function destroy(Category $category): bool|null
    {
        return $category->delete();
    }
}
