<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\PrefectureRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Prefecture;
use App\Validators\PrefectureValidator;

/**
 * Class PrefectureRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PrefectureRepositoryEloquent extends BaseRepository implements PrefectureRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Prefecture::class;
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
     * getPrefectures
     *
     * @return array
     */
    public function getPrefectures(): array
    {
        /** @var Builder $this */
        return $this
            ->getQuery()
            ->distinct()
            ->selectRaw('id as value,name')
            ->orderBy('name', 'asc')
            ->get()
            ->toArray();
    }
}
