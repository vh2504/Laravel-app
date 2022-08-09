<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ZipcodeRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Zipcode;
use App\Validators\ZipcodeValidator;

/**
 * Class ZipcodeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ZipcodeRepositoryEloquent extends BaseRepository implements ZipcodeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Zipcode::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @return void
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
