<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\StationRepository;
use App\Models\Station;
use App\Validators\StationValidator;

/**
 * Class StationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class StationRepositoryEloquent extends BaseRepository implements StationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Station::class;
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
     * @param int|null $stationId
     * @param int      $limit
     *
     * @return array
     */
    public function getOptions(?int $stationId, int $limit): array
    {
        /** @var Builder $this */
        $query = $this
            ->getQuery()
            ->distinct()
            ->selectRaw('id as value,name')
            ->orderBy('name', 'asc');

        if ($stationId) {
            $query->where('id', '=', $stationId);
        }

        return $query->take($limit)->get()->toArray();
    }

    /**
     * @param string $lineCode
     * @param string $code
     *
     * @return int|null
     */
    public function getIdByCode(string $lineCode, string $code): ?int
    {
        /** @var Builder $this */
        $model = $this
            ->where('code', '=', $code)
            ->where('line_code', '=', $lineCode)
            ->first();
        if ($model instanceof Station) {
            return $model->id;
        }

        return null;
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function suggest(int $id): array
    {
        /** @var Builder $this */
        return $this
            ->getQuery()
            ->distinct()
            ->selectRaw('stations.id as value,stations.name')
            ->leftJoin('lines as l', function (JoinClause $join) {
                $join->on('stations.line_code', '=', 'l.code');
            })
            ->where('l.id', '=', $id)
            ->orderBy('stations.name', 'asc')
            ->get()
            ->toArray();
    }
}
