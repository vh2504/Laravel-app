<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\LineStationRepository;
use App\Models\LineStation;
use App\Validators\LineStationValidator;

/**
 * Class LineStationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class LineStationRepositoryEloquent extends BaseRepository implements LineStationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LineStation::class;
    }

    /**
     * @return void
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
