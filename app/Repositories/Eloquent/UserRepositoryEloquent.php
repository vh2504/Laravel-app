<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\UserRepository;
use App\Enums\EPaginate;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @return void
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param array $filter
     * @param bool  $isExport
     * @return LengthAwarePaginator|Collection
     */
    public function search(array $filter, bool $isExport = false): LengthAwarePaginator|Collection
    {
        $orderBy = Arr::get($filter, 'orderBy', '');
        $orderType = Arr::get($filter, 'orderType', '');
        /** @var Builder $this */
        if (in_array($orderType, ['asc', 'desc']) && in_array($orderBy, ['name', 'birthday', 'email', 'created_at'])) {
            $query = $this->orderBy((string)$orderBy, (string)$orderType);
        } else {
            $query = $this->orderBy('id', 'asc');
        }

        if (!empty($filter['status'])) {
            $query = $query->where('status', $filter['status']);
        }

        if (!empty($filter['email'])) {
            $query = $query->where(function ($query) use ($filter) {
                $query->where('email', 'LIKE', '%'.$filter['email'].'%')
                ->orWhere(DB::raw("CONCAT(first_name,' ',last_name)"), 'LIKE', '%'.$filter['email'].'%')
                ->orWhere(DB::raw("CONCAT(first_name_hira,' ',last_name_hira)"), 'LIKE', '%'.$filter['email'].'%');
            });
        }

        if ($isExport) {
            return $query->get();
        }

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $query->paginate($limit);
    }

    /**
     * getUserByEmail
     *
     * @param string $email
     *
     * @return mixed
     */
    public function getUserByEmail(string $email): mixed
    {
        /** @var Builder $this */
        return $this->where('email', $email)->first();
    }

    /**
     * updatePassword
     *
     * @param array  $attr
     * @param string $email
     *
     * @return mixed
     */
    public function updatePassword(array $attr, string $email): mixed
    {
        /** @var Builder $this */
        $passwordReset = $this->where('email', $email)->update($attr);

        return $passwordReset;
    }
}
