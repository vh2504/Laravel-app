<?php

namespace App\Repositories\Eloquent;

use App\Enums\EPaginate;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\JobCollectionRepository;
use App\Models\JobCollection;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class JobCollectionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class JobCollectionRepositoryEloquent extends BaseRepository implements JobCollectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JobCollection::class;
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

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $query
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        /** @var Builder $this */
        return $this
            ->getQuery()
            ->select(['id', 'name'])
            ->whereNull('deleted_at')
            ->orderBy('name', 'asc')
            ->get()
            ->toArray();
    }

    /**
     * get All collection
     * @return Collection
     */
    public function getAll(): Collection
    {
        /** @var Builder $this */
        return $this->with([
            'jobCategories' => function ($query) {
                return $query->select(['job_categories.id', 'name']);
            }
        ])->get();
    }
}
