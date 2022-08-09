<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\FeatureJobCategoryRepository;
use App\Contracts\Repositories\FeatureRepository;
use App\Contracts\Repositories\JobCategoryJobCollectionRepository;
use App\Contracts\Repositories\JobCategoryRepository;
use App\Contracts\Repositories\JobCollectionRepository;
use App\Contracts\Service\BaseService;
use App\Enums\Feature\EType;
use App\Helpers\Common;
use App\Models\JobCategory;
use App\Models\JobCollection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class JobCategoryService implements BaseService
{
    /**
     * @param JobCategoryRepository              $repository
     * @param JobCollectionRepository            $collection
     * @param JobCategoryJobCollectionRepository $jobCategoryJobCollectionRepository
     * @param FeatureRepository                  $featureRepository
     * @param FeatureJobCategoryRepository       $featureJobCategoryRepository
     */
    public function __construct(
        private readonly JobCategoryRepository $repository,
        private readonly JobCollectionRepository $collection,
        private readonly JobCategoryJobCollectionRepository $jobCategoryJobCollectionRepository,
        private readonly FeatureRepository $featureRepository,
        private readonly FeatureJobCategoryRepository $featureJobCategoryRepository,
    ) {
        //..
    }

    /**
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator
    {
        return $this->repository->search($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return Model|null
     */
    public function store(Request $request): ?Model
    {
        $name = (string)$request->name;
        $value = [
            'name' => $name,
            'alias' => Common::createSlug($name),
            'is_popular' => (int)in_array($request->is_popular, [1, 'on']),
        ];

        // Save image
        $dir = "public/job_category";
        /** @var UploadedFile|null $image */
        $image = $request->file('image');
        if ($image instanceof UploadedFile) {
            $fileName = time().".".$image->getClientOriginalExtension();
            Storage::putFileAs($dir, $image, $fileName);
            $value['image'] = $fileName;
        }

        /** @var UploadedFile|null $icon */
        $icon = $request->file('icon');
        if ($icon instanceof UploadedFile) {
            $fileName = time()."-icon.".$icon->getClientOriginalExtension();
            Storage::putFileAs($dir, $icon, $fileName);
            $value['icon'] = $fileName;
        }

        /** @var JobCategory|null $model */
        $model = $this->repository->create($value);
        if ($model instanceof JobCategory) {
            // Assign with collections
            $collectionIds = (array)$request->collection_id;
            $this->jobCategoryJobCollectionRepository->deleteByJobCategories($model->id, $collectionIds);
            foreach ($collectionIds as $collectionId) {
                $this->jobCategoryJobCollectionRepository->create([
                    'job_collection_id' => $collectionId,
                    'job_category_id' => $model->id
                ]);
            }
            // Assign with feature

            /** @var \Prettus\Repository\Eloquent\BaseRepository $baseRepository */
            $baseRepository = $this->featureJobCategoryRepository;
            $baseRepository->deleteWhere(['job_category_id' => $model->id]);

            $featureIds = (array)$request->feature_id;
            if ($featureIds) {
                foreach ($featureIds as $featureId) {
                    $this->featureJobCategoryRepository->create([
                        'job_category_id' => $model->id,
                        'feature_id' => $featureId
                    ]);
                }
            }
        }//end if

        return null;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return Model|null
     */
    public function update(Request $request, int $id): ?Model
    {
        $name = (string)$request->name;
        $value = [
            'name' => $name,
            'alias' => Common::createSlug($name),
            'is_popular' => (int)in_array($request->is_popular, [1, 'on']),
        ];

        // Save image
        $dir = "public/job_category";
        /** @var UploadedFile|null $image */
        $image = $request->file('image');
        if ($image instanceof UploadedFile) {
            $fileName = time().".".$image->getClientOriginalExtension();
            Storage::putFileAs($dir, $image, $fileName);
            $value['image'] = $fileName;
        }

        /** @var UploadedFile|null $icon */
        $icon = $request->file('icon');
        if ($icon instanceof UploadedFile) {
            $fileName = time()."-icon.".$icon->getClientOriginalExtension();
            Storage::putFileAs($dir, $icon, $fileName);
            $value['icon'] = $fileName;
        }

        /** @var JobCategory|null $model */
        $model = $this->repository->update($value, $id);
        if ($model instanceof JobCategory) {
            // Assign with collections
            $collectionIds = (array)$request->collection_id;
            $this->jobCategoryJobCollectionRepository->deleteByJobCategories($model->id, $collectionIds);
            foreach ($collectionIds as $collectionId) {
                $this->jobCategoryJobCollectionRepository->create([
                    'job_collection_id' => $collectionId,
                    'job_category_id' => $model->id
                ]);
            }

            // Assign with feature
            /** @var \Prettus\Repository\Eloquent\BaseRepository $baseRepository */
            $baseRepository = $this->featureJobCategoryRepository;
            $baseRepository->deleteWhere(['job_category_id' => $model->id]);

            $featureIds = (array)$request->feature_id;
            if ($featureIds) {
                foreach ($featureIds as $featureId) {
                    $this->featureJobCategoryRepository->create([
                        'job_category_id' => $model->id,
                        'feature_id' => $featureId
                    ]);
                }
            }
        }//end if

        return $model;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        $model = $this->findById($id);
        if ($model instanceof JobCategory) {
            return boolval($model->delete());
        }

        return false;
    }

    /**
     * @param int $id
     *
     * @return Model|null
     */
    public function findById(int $id): ?Model
    {
        $model = $this->repository->find($id);
        if ($model instanceof Model) {
            return $model;
        }

        return null;
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getOldCollections(int $id): array
    {
        return $this->jobCategoryJobCollectionRepository
            ->getGroupCollections([$id], 1000)
            ->pluck('job_collection_id')
            ->toArray();
    }

    /**
     * @return array
     */
    public function getGroupFeatures(): array
    {
        return $this->featureRepository->getGroupList();
    }

    /**
     * @return array
     */
    public function getCollectionOptions(): array
    {
        return $this->collection->getOptions();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getOldFeatureIds(int $id): array
    {
        return $this->featureJobCategoryRepository->getOldFeatureIds($id);
    }

    /**
     * @return array
     */
    public function getTypeOptions(): array
    {
        return [
            ['name' => __('job_category.field.type.medical_subjects'), 'value' => EType::MEDICAL_SUBJECTS->value],
            ['name' => __('job_category.field.type.service'), 'value' => EType::SERVICE->value],
            ['name' => __('job_category.field.type.job_description'), 'value' => EType::JOB_DESCRIPTION->value],
            ['name' => __('job_category.field.type.welfare'), 'value' => EType::WELFARE->value],
            ['name' => __('job_category.field.type.working_time'), 'value' => EType::WORKING_TIME->value],
            ['name' => __('job_category.field.type.holiday'), 'value' => EType::HOLIDAY->value],
            [
                'name' => __('job_category.field.type.application_requirements'),
                'value' => EType::APPLICATION_REQUIREMENTS->value
            ],
            ['name' => __('job_category.field.type.access'), 'value' => EType::ACCESS->value],
        ];
    }

    /**
     * @param array $ids
     * @param int   $limitLabel
     * @param int   $limitRecord
     *
     * @return array
     */
    public function getGroupCollectionLabels(array $ids, int $limitLabel = 5, int $limitRecord = 100): array
    {
        $collection = $this->jobCategoryJobCollectionRepository->getGroupCollections($ids, $limitRecord);
        if ($collection->count()) {
            return $collection
                ->groupBy('job_category_id')
                ->map(function ($records) use ($limitLabel) {
                    $suffix = '';
                    $labels = $records
                        ->map(function ($v) {
                            /** @var JobCollection $v */
                            return "<span class='badge badge-default'>{$v->name}</span>";
                        })
                        ->chunk($limitLabel);
                    if ($labels->count() > 1) {
                        $suffix .= ' ,...';
                    }

                    $firstList = $labels->first();
                    if ($firstList) {
                        return implode(' ', (array)$firstList->toArray()).$suffix;
                    }

                    return '';
                })
                ->toArray();
        }//end if

        return [];
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function popular(int $id): bool
    {
        $model = $this->repository->find($id);
        if ($model instanceof JobCategory) {
            $value = ($model->is_popular ? 0 : 1);
            $this->repository->update(['is_popular' => $value], $id);

            return boolval($value);
        }

        return false;
    }
}
