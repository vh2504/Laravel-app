<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\FeatureJobCategoryRepository;
use App\Models\FeatureJobCategory;

/**
 * Class FeatureJobCategory1RepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class FeatureJobCategoryRepositoryEloquent extends BaseRepository implements FeatureJobCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FeatureJobCategory::class;
    }

    /**
     * @return void
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getOldFeatureIds(int $id): array
    {
        /** @var Builder $this */
        $query = $this->getQuery();
        $result = $query
            ->select(['feature_id'])
            ->where('job_category_id', '=', $id)
            ->get();

        if ($result instanceof Collection) {
            return $result->pluck('feature_id')->toArray();
        }

        return [];
    }
}
