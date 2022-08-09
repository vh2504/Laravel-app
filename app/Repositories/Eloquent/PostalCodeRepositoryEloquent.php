<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\PostalCodeRepository;
use App\Models\PostalCode;
use App\Validators\PostalCodeValidator;

/**
 * Class PostalCodeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PostalCodeRepositoryEloquent extends BaseRepository implements PostalCodeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostalCode::class;
    }

    /**
     * @return void
     * Boot up the repository, pushing criteria
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param string   $postalCode
     * @param int|null $cityId
     *
     * @return array
     */
    public function suggestPrefectures(string $postalCode, ?int $cityId): array
    {
        if (!$postalCode) {
            return [];
        }

        /** @var Builder $this */
        return $this
            ->getQuery()
            ->distinct()
            ->selectRaw('p.id as value,p.name')
            ->leftJoin('cities as c', function (JoinClause $join) {
                $join->on('postal_codes.city_id', '=', 'c.id');
            })
            ->leftJoin('prefectures as p', function (JoinClause $join) {
                $join->on('c.prefecture_id', '=', 'p.id');
            })
            ->where(function ($query) use ($postalCode, $cityId) {
                $query
                    ->where('first_code', '=', $postalCode)
                    ->orWhere('last_code', '=', $postalCode)
                    ->orWhere('c.id', '=', $cityId);
            })
            ->where(function ($query) use ($postalCode) {
                $query
                    ->where('postal_code', 'like', "{$postalCode}%")
                    ->orWhere('zip_code', 'like', "{$postalCode}%");
            })
            ->orderBy('p.name', 'asc')
            ->get()
            ->toArray();
    }
}
