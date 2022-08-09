<?php

namespace App\Repositories\Eloquent;

use App\Enums\Feature\EType;
use \Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\FeatureRepository;
use App\Enums\EPaginate;
use App\Models\Feature;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

/**
 * Class FeatureRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class FeatureRepositoryEloquent extends BaseRepository implements FeatureRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Feature::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @return void
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get List and Filter Feature
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator
    {
        /** @var Builder $this */
        $query = $this->with([
            'jobCategories' => function ($query) {
                return $query->select(['job_categories.id', 'name']);
            }
        ]);
        $typeGroup = Arr::get($filter, 'type_group');
        if ($typeGroup !== null) {
            $query->where('type_group', $typeGroup);
        }

        $name = Arr::get($filter, 'name');
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }

        $jobCategory = Arr::get($filter, 'job_category');
        if ($jobCategory) {
            $query->whereHas('jobCategories', function ($query) use ($jobCategory) {
                return $query->where('job_categories.id', $jobCategory);
            });
        }

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $query->orderBy('is_popular', 'desc')->orderBy('created_at', 'desc')->paginate($limit);
    }

    /**
     * @param int $limit
     * @return array
     */
    public function getGroupList(int $limit = 1000): array
    {
        /** @var Builder $this */
        $query = $this->getQuery();
        return $query
            ->select(['id', 'name', 'type_group'])
            ->take($limit)
            ->get()
            ->groupBy('type_group')
            ->toArray();
    }

    /**
     * @param int $type
     *
     * @return array
     */
    public function getListTypeOptions(int $type): array
    {
        /** @var Builder $this */
        $query = $this->getQuery();

        return $query
            ->select(['id', 'name'])
            ->where('type_group', '=', $type)
            ->get()
            ->toArray();
    }
}
