<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\PostRepository;
use App\Enums\EPaginate;
use App\Enums\Post\EPostStatus;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Post::class;
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
        $query = $this->with([
            'categories' => function ($query) {
                return $query->select(['categories.id', 'name']);
            },
            'jobCategories' => function ($query) {
                return $query->select(['job_categories.id', 'name']);
            },
            'creator' => function ($query) {
                return $query->select('id', 'name');
            }
        ]);
        if ($filter['status'] !== null) {
            $status = $filter['status'] == EPostStatus::Published->value
                ? EPostStatus::Approved->value : $filter['status'];
            $isPublish = 0;
            if ($filter['status'] == EPostStatus::Published->value) {
                $isPublish = 1;
            }
            if ($filter['status'] == EPostStatus::Approved->value) {
                $isPublish = -1;
            }
            $query->where('status', $status);
            if ($isPublish == 1) {
                $query->whereDate('published_at', '<=', now());
            }
            if ($isPublish == -1) {
                $query->where(function ($q) {
                    $q->whereDate('published_at', '>', now());
                    $q->orWhereNull('published_at');
                });
            }
        }//end if

        $title = Arr::get($filter, 'title');
        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }

        $category = Arr::get($filter, 'category');
        if ($category) {
            $query->whereHas('categories', function ($query) use ($category) {
                return $query->where('categories.id', $category);
            });
        }

        $limit = EPaginate::LIMIT->value;
        if (isset($_COOKIE['limit']) && in_array($_COOKIE['limit'], (array)config('custom.page-limit'))) {
            $limit = $_COOKIE['limit'];
        }

        return $query->orderBy('is_popular', 'desc')->orderBy('created_at', 'desc')->paginate($limit);
    }

    /**
     * Get List and Filter Post
     *
     * @return integer
     */
    public function getCountPopular(): int
    {
        /** @var Builder $this */
        return $this->where('is_popular', 1)->count();
    }
}
