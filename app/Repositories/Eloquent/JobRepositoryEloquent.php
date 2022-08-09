<?php

namespace App\Repositories\Eloquent;

use App\Enums\EPaginate;
use App\Enums\Job\ESalaryType;
use App\Enums\Job\EStatus;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\JobRepository;
use App\Models\Job;
use App\Validators\JobValidator;

/**
 * Class JobRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class JobRepositoryEloquent extends \App\Repositories\Eloquent\BaseRepository implements JobRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Job::class;
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
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator
    {
        /** @var Builder $this */
        $query = $this->getQuery();
        $query->whereNull('deleted_at');

        $name = $request->search;
        if ($name) {
            $query->where('title', 'LIKE', '%'.$name.'%');
        }

        /** @var null|string $jobCategory */
        $jobCategory = $request->job_category;

        if ($jobCategory) {
            $query->where('category_id', (int)$jobCategory);
        }

        /** @var null|string $status */
        $status = $request->status;
        if (!is_null($status) && in_array($status, [EStatus::SHOW->value, EStatus::HIDE->value])) {
            $query->where('status', (int)$status);
        }

        if ($status == EStatus::DRAFTS->value) {
            $query->where('status', (int)$status)->where('created_by_id', Auth::id());
        }

        /** @var string|null $salaryType */
        $salaryType = $request->salary_type;

        if (is_numeric($salaryType) && in_array((int)$salaryType, array_column(ESalaryType::cases(), 'value'))) {
            $query->whereJsonContains('salary', [
                'type' => $salaryType
            ]);
        }

        /** @var \App\Repositories\Eloquent\BaseRepository $this */
        return $this->paginateCustom($query);
    }
}
