<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\JobCategoryOfficeRepository;
use App\Models\JobCategoryOffice;
use App\Validators\JobCategoryOfficeValidator;

/**
 * Class JobCategoryOfficeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class JobCategoryOfficeRepositoryEloquent extends BaseRepository implements JobCategoryOfficeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JobCategoryOffice::class;
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
