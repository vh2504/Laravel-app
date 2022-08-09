<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CityRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\City;
use App\Validators\CityValidator;

/**
 * Class CityRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class CityRepositoryEloquent extends BaseRepository implements CityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return City::class;
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
     * @param int $id
     *
     * @return array
     */
    public function suggestCities(int $id): array
    {
        if (!$id) {
            return [];
        }

        /** @var Builder $this */
        return $this
            ->getQuery()
            ->selectRaw('id as value,name')
            ->where('prefecture_id', '=', $id)
            ->orderBy('name', 'asc')
            ->get()
            ->toArray();
    }
}
