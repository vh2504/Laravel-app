<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\JobImageRepository;
use App\Models\JobImage;
use App\Validators\JobImageValidator;

/**
 * Class JobImageRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class JobImageRepositoryEloquent extends BaseRepository implements JobImageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JobImage::class;
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
