<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\JobCategoryJobCollectionRepository;
use App\Contracts\Repositories\JobCategoryRepository;
use App\Contracts\Repositories\JobCollectionRepository;
use App\Contracts\Service\BaseService;
use App\Models\JobCategory;
use App\Models\JobCollection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CollectionService implements BaseService
{
    /**
     * @param JobCollectionRepository            $repository
     * @param JobCategoryRepository              $jobCategoryRepository
     * @param JobCategoryJobCollectionRepository $jobCategoryJobCollectionRepository
     */
    public function __construct(
        protected readonly JobCollectionRepository $repository,
        protected readonly JobCategoryRepository $jobCategoryRepository,
        protected readonly JobCategoryJobCollectionRepository $jobCategoryJobCollectionRepository
    ) {
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator
    {
        return $this->repository->search($request);
    }

    /**
     * Get all collection
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->getAll();
    }

    /**
     * @param Request $request
     *
     * @return JobCollection|null
     */
    public function store(Request $request): ?JobCollection
    {
        // Save base  data
        $value = [
            'name' => (string)$request->name,
            'summary' => (string)$request->summary,
            'priority' => (int)$request->priority,
        ];

        // Save image

        $dir = "public/collection";

        /** @var UploadedFile|null $image */
        $image = $request->image;
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


        /** @var JobCollection|null $collection */
        $collection = $this->repository->create($value);
        if ($collection instanceof JobCollection) {
            // Save collection categories
            $categories = $request->category_id ?? [];
            if ($categories) {
                $categories = array_unique((array)$categories);
                foreach ($categories as $category) {
                    $this->jobCategoryJobCollectionRepository->create([
                        'job_collection_id' => $collection->id,
                        'job_category_id' => $category
                    ]);
                }
            }
        }

        return $collection;
    }

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return JobCollection|null
     */
    public function update(Request $request, int $id): ?JobCollection
    {
        /** @var JobCollection|null $collection */
        $collection = $this->findById($id);
        if (!$collection instanceof JobCollection) {
            return null;
        }

        // Save base  data
        $value = [
            'name' => (string)$request->name,
            'summary' => (string)$request->summary,
            'priority' => (int)$request->priority,
        ];

        // Save image

        $dir = "public/collection";

        /** @var UploadedFile|null $image */
        $image = $request->image;
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

        /** @var JobCollection|null $collection */
        $collection = $this->repository->update($value, $collection->id);
        if ($collection instanceof JobCollection) {
            // Save collection categories
            $categories = $request->category_id ?? [];
            if ($categories) {
                $categories = array_unique((array)$categories);
                foreach ($categories as $category) {
                    $this->jobCategoryJobCollectionRepository->updateOrCreate([
                        'job_collection_id' => $collection->id,
                        'job_category_id' => $category
                    ]);
                }
            }
        }

        return $collection;
    }

    /**
     * @param array $ids
     * @param int   $limitLabel
     * @param int   $limitRecord
     *
     * @return array
     */
    public function getGroupCategoryLabels(array $ids, int $limitLabel = 5, int $limitRecord = 100): array
    {
        $collection = $this->jobCategoryJobCollectionRepository->getGroupCategories($ids, $limitRecord);
        if ($collection->count()) {
            return $collection
                ->groupBy('job_collection_id')
                ->map(function ($records) use ($limitLabel) {
                    $suffix = '';
                    $labels = $records
                        ->map(function ($v) {
                            /** @var JobCategory $v */
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
    public function delete(int $id): bool
    {
        $collection = $this->findById($id);
        if ($collection instanceof JobCollection) {
            return boolval($collection->delete());
        }

        return false;
    }

    /**
     * @param int $id
     *
     * @return JobCollection|null
     */
    public function findById(int $id): ?JobCollection
    {
        $collection = $this->repository->find($id);
        if (!$collection instanceof JobCollection) {
            return throw new NotFoundHttpException();
        }

        return $collection;
    }

    /**
     * @return array
     */
    public function getCategoryOptions(): array
    {
        return $this->jobCategoryRepository->getOptions();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getCategorySelectedOptions(int $id): array
    {
        return $this->jobCategoryJobCollectionRepository->getCategoryIds($id);
    }
}
