<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\JobLineStationRepository;
use App\Models\JobLineStation;
use App\Validators\JobLineStationValidator;

/**
 * Class JobLineStationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class JobLineStationRepositoryEloquent extends BaseRepository implements JobLineStationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JobLineStation::class;
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
