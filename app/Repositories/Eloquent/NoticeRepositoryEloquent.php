<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\NoticeRepository;
use App\Enums\EPaginate;
use App\Models\Notice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class NoticeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class NoticeRepositoryEloquent extends BaseRepository implements NoticeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Notice::class;
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
     * Get List and Filter Notice
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator
    {
        /** @var Builder $this */

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $this->orderBy('created_at', 'desc')->paginate($limit);
    }
}
