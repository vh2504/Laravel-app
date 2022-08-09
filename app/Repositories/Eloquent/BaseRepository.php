<?php

namespace App\Repositories\Eloquent;

use App\Enums\EPaginate;
use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class BaseRepository extends \Prettus\Repository\Eloquent\BaseRepository
{
    /** @var string[] */
    const TYPE_PERMISSION_SORT = ['asc', 'desc'];

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param array                              $sort
     * @param string                             $sortId
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateCustom(Builder $query, array $sort = [], string $sortId = ""): LengthAwarePaginator
    {
        /** @var \Illuminate\Http\Request $request */
        $request = request();
        $nameSession = "/".$request->path()."_perPage";

        $limit = (int)($request->session()->get($nameSession) ?? $request->perPage);
        if (!in_array($limit, (array)config('custom.page-limit'))) {
            $limit = EPaginate::LIMIT->value;
        }
        /** @var string|null $columnSort */
        $columnSort = $request->get('column');

        $typeSort = (string)$request->get('sort', '');
        if ($columnSort && in_array($typeSort, self::TYPE_PERMISSION_SORT)) {
            $query->orderBy($columnSort, $typeSort);
        }

        foreach ($sort as $column => $type) {
            if (!in_array($type, self::TYPE_PERMISSION_SORT)) {
                continue;
            }
            $query->orderBy((string)$column, $type);
        }

        if (is_null($columnSort) && in_array($sortId, self::TYPE_PERMISSION_SORT)) {
            $query->orderBy('id', $sortId);
        }

        return $query->paginate($limit);
    }
}
