<?php

namespace App\Repositories\Eloquent;

use App\Enums\EPaginate;
use App\Models\JobCategoryJobCollection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\JobCategoryRepository;
use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class JobCategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class JobCategoryRepositoryEloquent extends BaseRepository implements JobCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JobCategory::class;
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
     * @param int $chunkNumber
     *
     * @return array
     */
    public function getOptions(int $chunkNumber = 6): array
    {
        /** @var Builder $this */
        $result = $this->select(['id', 'name'])->get();
        if ($chunkNumber) {
            return $result->chunk($chunkNumber)->toArray();
        }

        return $result->toArray();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator
    {
        /** @var Builder $this */
        $query = $this->getQuery();
        $query->whereNull('deleted_at');

        $name = $request->name;
        if ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
        }

        // Collection
        $collectionId = (int)$request->collection_id;
        if ($collectionId) {
            $query->whereIn('id', function ($query) use ($collectionId) {
                $query->select('job_category_id')
                    ->from(with(new JobCategoryJobCollection())->getTable())
                    ->where('job_collection_id', '=', $collectionId);
            });
        }

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $query
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    /**
     * get Job category not include collection
     *
     * @return Collection
     */
    public function getNotInCollection(): Collection
    {
        /** @var Builder $this */
        return $this->whereDoesntHave('jobCollections')->get();
    }
}
