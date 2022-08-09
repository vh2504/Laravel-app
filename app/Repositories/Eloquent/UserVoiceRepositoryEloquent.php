<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\UserVoiceRepository;
use App\Enums\EPaginate;
use App\Models\UserVoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

/**
 * Class UserVoiceRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class UserVoiceRepositoryEloquent extends BaseRepository implements UserVoiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return UserVoice::class;
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
     * Get List and Filter UserVoice
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function search(array $filter): LengthAwarePaginator
    {
        /** @var Builder $this */
        $query = $this->with([
            'user' => function ($query) {
                return $query->select('id', 'name', 'email');
            }
        ]);

        $comment = Arr::get($filter, 'comment');
        if ($comment) {
            $query->where('comment', 'LIKE', '%' . $comment . '%');
        }

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $query->orderBy('is_popular', 'desc')->orderBy('created_at', 'desc')->paginate($limit);
    }

    /**
     * Get List and Filter UserVoice
     *
     * @return integer
     */
    public function getCountPopular(): int
    {
        /** @var Builder $this */
        return $this->where('is_popular', 1)->count();
    }
}
