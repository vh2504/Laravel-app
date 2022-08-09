<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\UserAdminRepository;
use App\Models\UserAdmin;
use App\Validators\UserAdminValidator;

/**
 * Class UserAdminRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class UserAdminRepositoryEloquent extends BaseRepository implements UserAdminRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserAdmin::class;
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
