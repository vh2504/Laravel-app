<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\CategoryRepository;
use App\Enums\EPaginate;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

/**
 * Class CategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @return void
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get List and Filter Post
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator
    {
        /** @var Builder $this */
        $query = $this->with(['posts']);

        $title = Arr::get($filter, 'name');
        if ($title) {
            $query->where('name', 'LIKE', '%' . $title . '%');
        }

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $query->orderBy('created_at', 'desc')->paginate($limit);
    }
}
