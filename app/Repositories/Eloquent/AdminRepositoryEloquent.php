<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\AdminRepository;
use App\Enums\EPaginate;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

/**
 * Class AdminRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class AdminRepositoryEloquent extends BaseRepository implements AdminRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Admin::class;
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
     * @param array $filter
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator
    {
        $orderBy = Arr::get($filter, 'orderBy', '');
        $orderType = Arr::get($filter, 'orderType', '');
        
        /** @var Builder $this */
        if (in_array($orderType, ['asc', 'desc']) && in_array($orderBy, ['name', 'birthday', 'email', 'created_at'])) {
            $query = $this->orderBy((string)$orderBy, (string)$orderType);
        } else {
            $query = $this->orderBy('id', 'asc');
        }

        if (!empty($filter['email'])) {
            $query = $query->where('email', 'LIKE', '%' . $filter['email'] . '%');
        }

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $query->paginate($limit);
    }
}
