<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\JobCategoryRepository;
use App\Contracts\Repositories\FeatureRepository;
use App\Enums\Feature\EType;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

/**
 * This is class Feature Service
 */
class FeatureService
{
    /**
     * contructor
     *
     * @param \App\Contracts\Repositories\FeatureRepository     $repository
     * @param \App\Contracts\Repositories\JobCategoryRepository $repositoryJobCategory
     * @return void
     */
    public function __construct(
        protected readonly FeatureRepository $repository,
        protected readonly JobCategoryRepository $repositoryJobCategory
    ) {
    }

    /**
     * Display a listing of the Feature.
     * @param \Illuminate\Http\Request $request
     *
     * @return array<mixed>
     */
    public function index(Request $request): array
    {
        $features = $this->repository->search($request->all());
        $jobCategories = $this->repositoryJobCategory->all();
        $listTypeGroup = EType::cases();

        return compact('features', 'jobCategories', 'listTypeGroup');
    }

    /**
     * Store Feature
     *
     * @param array $dataRequest
     *
     * @return Feature
     */
    public function store(array $dataRequest): Feature
    {
        $feature = $this->repository->create($dataRequest);
        /** @var array $jobCategoryIds */
        $jobCategoryIds = Arr::get($dataRequest, 'job_category_ids', []);
        /** @var Feature $feature */
        $feature->jobCategories()->attach(array_unique($jobCategoryIds));

        return $feature;
    }

    /**
     * Update Feature
     *
     * @param array   $dataRequest
     * @param Feature $feature
     *
     * @return Feature
     */
    public function update(array $dataRequest, Feature $feature): Feature
    {
        $feature->update($dataRequest);
        /** @var Feature $feature */
        $feature->jobCategories()->detach();
        /** @var array $jobCategoryIds */
        $jobCategoryIds = Arr::get($dataRequest, 'job_category_ids', []);
        $feature->jobCategories()->attach(array_unique($jobCategoryIds));

        return $feature;
    }

    /**
     * Show the form for creating or updating resource.
     *
     * @return array<string, mixed>
     */
    public function getDataFormFeature(): array
    {
        $jobCategoryNotInCollections = $this->repositoryJobCategory->getNotInCollection();
        $typeGroups = EType::cases();

        return compact('typeGroups', 'jobCategoryNotInCollections');
    }

    /**
     * Delete feature
     * @param Feature $feature
     *
     * @return bool|null
     */
    public function destroy(Feature $feature): bool|null
    {
        return $feature->delete();
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function popular(int $id): bool
    {
        $model = $this->repository->find($id);
        if ($model instanceof Feature) {
            $value = ($model->is_popular ? 0 : 1);
            $this->repository->update(['is_popular' => $value], $id);

            return boolval($value);
        }

        return false;
    }
}
