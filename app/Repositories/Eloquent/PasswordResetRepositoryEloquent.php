<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\PasswordResetRepository;
use App\Models\PasswordReset;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class PasswordResetRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PasswordResetRepositoryEloquent extends BaseRepository implements PasswordResetRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PasswordReset::class;
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
     * getPasswordResetByEmail
     *
     * @param string $email
     *
     * @return mixed
     */
    public function getPasswordResetByEmail(string $email): mixed
    {
        /** @var Builder $this */
        return $this->where('email', $email)->first();
    }

    /**
     * getPasswordResetByToken
     *
     * @param string $token
     *
     * @return mixed
     */
    public function getPasswordResetByToken(string $token): mixed
    {
        /** @var Builder $this */
        return $this->where('token', $token)->first();
    }

    /**
     * updateToken
     *
     * @param array  $attr
     * @param string $email
     *
     * @return mixed
     */
    public function updateToken(array $attr, string $email): mixed
    {
        /** @var Builder $this */
        $passwordReset = $this->where('email', $email)->update($attr);

        return $passwordReset;
    }

    /**
     * destroyPasswordResetByEmail
     *
     * @param string $email
     *
     * @return int
     */
    public function destroyPasswordResetByEmail(string $email): int
    {
        /** @var Builder $this */
        return $this->getQuery()->where('email', $email)->delete();
    }

    /**
     * destroyPasswordResetByToken
     *
     * @param string $token
     *
     * @return int
     */
    public function destroyPasswordResetByToken(string $token): int
    {
        /** @var Builder $this */
        return $this->getQuery()->where('token', $token)->delete();
    }
}
