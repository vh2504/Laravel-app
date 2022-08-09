<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\LineRepository;
use App\Models\Line;
use App\Validators\LineValidator;

/**
 * Class LineRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class LineRepositoryEloquent extends BaseRepository implements LineRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Line::class;
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
     * @param string $code
     *
     * @return int|null
     */
    public function getIdByCode(string $code): ?int
    {
        /** @var Builder $this */
        $model = $this->where('code', '=', $code)->first();
        if ($model instanceof Line) {
            return $model->id;
        }

        return null;
    }

    /**
     * @param int|null $lineId
     * @param int      $limit
     *
     * @return array
     */
    public function getOptions(?int $lineId, int $limit): array
    {
        /** @var Builder $this */
        $query = $this
            ->getQuery()
            ->distinct()
            ->selectRaw('id as value,name')
            ->orderBy('name', 'asc')
            ->take($limit);

        if ($lineId) {
            $query->where('id', '=', $lineId);
        }

        return $query->get()->toArray();
    }

    /**
     * @param string $q
     *
     * @return array
     */
    public function suggest(string $q): array
    {
        /** @var Builder $this */
        return $this
            ->getQuery()
            ->distinct()
            ->selectRaw('id,name as text')
            ->where(function ($query) use ($q) {
                $query
                    ->where('name', 'like', "%{$q}%")
                    ->orWhere('code', 'like', "%{$q}%");
            })
            ->orderBy('name', 'asc')
            ->get()
            ->toArray();
    }
}
