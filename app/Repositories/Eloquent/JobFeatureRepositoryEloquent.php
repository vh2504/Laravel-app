<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\JobFeatureRepository;
use App\Models\JobFeature;
use App\Validators\JobFeatureValidator;

/**
 * Class JobFeatureRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class JobFeatureRepositoryEloquent extends BaseRepository implements JobFeatureRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JobFeature::class;
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
    public function getAllWithJobId(int $id): array
    {
        /** @var Builder $this */
        return $this->getQuery()
            ->select(['feature_type', 'feature_id'])
            ->where('job_id', '=', $id)
            ->get()
            ->groupBy('feature_type')
            ->map(function (Collection $c) {
                return $c->pluck('feature_id');
            })
            ->toArray();
    }
}
