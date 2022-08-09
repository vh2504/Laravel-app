<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\JobCategoryJobCollectionRepository;
use App\Models\JobCategoryJobCollection;
use App\Validators\JobCategoryJobCollectionValidator;

/**
 * Class JobCategoryJobCollectionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class JobCategoryJobCollectionRepositoryEloquent extends BaseRepository implements JobCategoryJobCollectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JobCategoryJobCollection::class;
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
     * @return array
     */
    public function getCategoryIds(int $id): array
    {
        /** @var Builder $this */
        return $this->getQuery()
            ->where('job_collection_id', $id)
            ->get()
            ->pluck(['job_category_id'])
            ->toArray();
    }

    /**
     * @param array $id
     * @param int   $limit
     * @return Collection
     */
    public function getGroupCategories(array $id, int $limit): Collection
    {
        /** @var Builder $this */
        return $this
            ->getQuery()
            ->select([
                'job_collection_id',
                'job_category_id',
                'jc.name'
            ])
            ->leftJoin('job_categories as jc', function (JoinClause $join) {
                $join->on('job_category_job_collections.job_category_id', '=', 'jc.id');
            })
            ->take($limit)
            ->get();
    }

    /**
     * @param array $id
     * @param int   $limit
     * @return Collection
     */
    public function getGroupCollections(array $id, int $limit): Collection
    {
        /** @var Builder $this */
        return $this
            ->getQuery()
            ->select([
                'job_collection_id',
                'job_category_id',
                'jc.name'
            ])
            ->leftJoin('job_collections as jc', function (JoinClause $join) {
                $join->on('job_category_job_collections.job_collection_id', '=', 'jc.id');
            })
            ->take($limit)
            ->get();
    }

    /**
     * @param int   $catId
     * @param array $collectionId
     * @return int
     */
    public function deleteByJobCategories(int $catId, array $collectionId): int
    {
        /** @var Builder $this */
        return $this
            ->getQuery()
            ->where('job_category_id', $catId)
            ->whereIntegerInRaw('job_collection_id', $collectionId)
            ->delete();
    }
}
