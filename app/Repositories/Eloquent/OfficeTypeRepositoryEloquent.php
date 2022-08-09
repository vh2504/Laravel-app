<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\OfficeTypeRepository;
use App\Models\OfficeType;
use App\Validators\OfficeTypeValidator;

/**
 * Class OfficeTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class OfficeTypeRepositoryEloquent extends BaseRepository implements OfficeTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OfficeType::class;
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
