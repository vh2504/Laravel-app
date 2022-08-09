<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\CityRepository;
use App\Contracts\Repositories\FeatureRepository;
use App\Contracts\Repositories\JobCategoryRepository;
use App\Contracts\Repositories\JobCollectionRepository;
use App\Contracts\Repositories\JobFeatureRepository;
use App\Contracts\Repositories\JobImageRepository;
use App\Contracts\Repositories\JobLineStationRepository;
use App\Contracts\Repositories\JobRepository;
use App\Contracts\Repositories\LineRepository;
use App\Contracts\Repositories\PostalCodeRepository;
use App\Contracts\Repositories\StationRepository;
use App\Contracts\Service\BaseService;
use App\Enums\Feature\EType;
use App\Enums\Job\ESalaryType;
use App\Models\Admin;
use App\Models\Job;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JobService implements BaseService
{
    /**
     * @param \App\Contracts\Repositories\JobRepository            $repository
     * @param \App\Contracts\Repositories\JobCategoryRepository    $jobCategoryRepository
     * @param \App\Contracts\Repositories\JobCollectionRepository  $collectionRepository
     * @param \App\Contracts\Repositories\FeatureRepository        $featureRepository
     * @param \App\Contracts\Repositories\JobImageRepository       $imageRepository
     * @param \App\Contracts\Repositories\JobFeatureRepository     $jobFeatureRepository
     * @param \App\Contracts\Repositories\PostalCodeRepository     $postalCodeRepository
     * @param \App\Contracts\Repositories\CityRepository           $cityRepository
     * @param \App\Contracts\Repositories\LineRepository           $lineRepository
     * @param \App\Contracts\Repositories\StationRepository        $stationRepository
     * @param \App\Contracts\Repositories\JobLineStationRepository $jobLineStationRepository
     */
    public function __construct(
        protected readonly JobRepository $repository,
        protected readonly JobCategoryRepository $jobCategoryRepository,
        protected readonly JobCollectionRepository $collectionRepository,
        protected readonly FeatureRepository $featureRepository,
        protected readonly JobImageRepository $imageRepository,
        protected readonly JobFeatureRepository $jobFeatureRepository,
        protected readonly PostalCodeRepository $postalCodeRepository,
        protected readonly CityRepository $cityRepository,
        protected readonly LineRepository $lineRepository,
        protected readonly StationRepository $stationRepository,
        protected readonly JobLineStationRepository $jobLineStationRepository
    ) {
    }

    /**
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator
    {
        return $this->repository->search($request);
    }

    /**
     * @param Request $request
     *
     * @return Model|null
     */
    public function store(Request $request): ?Model
    {
        $data = $request->all();
        $attributes['created_by_id'] = Auth::id();

        /** @var \App\Models\Job $model */
        $model = $this->repository->create($data);
        if (!$model instanceof Job) {
            return null;
        }

        $this->saveJobLineStation($model, $request);
        $this->saveFeature($model, $request, false);

        // Upload images
        if ($request->hasFile('image')) {
            $isDefault = 1;
            foreach ((array)$request->file('image') as $image) {
                if ($image instanceof UploadedFile) {
                    $fileName = Str::random(20).".".$image->getClientOriginalExtension();
                    $dir = "public/jobs/{$model->id}";
                    if (Storage::putFileAs($dir, $image, $fileName)) {
                        $this->imageRepository->create([
                            'job_id' => $model->id,
                            'file_name' => $fileName,
                            'is_default' => $isDefault
                        ]);
                    }
                    $isDefault = 0;
                }
            }
        }

        return $model;
    }

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return Model|null
     */
    public function update(Request $request, int $id): ?Model
    {
        $model = $this->findById($id);
        if (!$model instanceof Job) {
            return null;
        }

        $attributes = $request->toArray();
        $this->saveJobLineStation($model, $request);
        $this->saveFeature($model, $request, false);

        // Upload images
        if ($request->hasFile('image')) {
            $isDefault = 1;
            foreach ((array)$request->file('image') as $image) {
                if ($image instanceof UploadedFile) {
                    $fileName = Str::random(20).".".$image->getClientOriginalExtension();
                    $dir = "public/jobs/{$model->id}";
                    if (Storage::putFileAs($dir, $image, $fileName)) {
                        $this->imageRepository->create([
                            'job_id' => $model->id,
                            'file_name' => $fileName,
                            'is_default' => $isDefault
                        ]);
                    }
                    $isDefault = 0;
                }
            }
        }
        $this->repository->update($attributes, $id);

        return null;
    }

    /**
     * @param \App\Models\Job          $job
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    private function saveJobLineStation(Job $job, Request $request): void
    {
        /** @var \Prettus\Repository\Eloquent\BaseRepository $jobLineStationRepository */
        $jobLineStationRepository = $this->jobLineStationRepository;
        $jobLineStationRepository->deleteWhere(['job_id' => $job->id]);

        $lineStations = (array)$request->line_station;
        if ($lineStations) {
            foreach ($lineStations as $value) {
                $lineId = (int)Arr::get((array)$value, 'line_id', 0);
                $stationId = (int)Arr::get((array)$value, 'station_id', 0);
                $distance = (string)Arr::get((array)$value, 'station_id', '');
                $this->jobLineStationRepository->create([
                    'job_id' => $job->id,
                    'line_id' => $lineId,
                    'station_id' => $stationId,
                    'distance' => $distance
                ]);
            }
        }
    }

    /**
     * @param \App\Models\Job          $job
     * @param \Illuminate\Http\Request $request
     * @param bool                     $deleteOld
     *
     * @return void
     */
    private function saveFeature(Job $job, Request $request, bool $deleteOld): void
    {
        try {
            $jobFeatureRepository = $this->jobFeatureRepository;
            if ($deleteOld) {
                /** @var \Prettus\Repository\Eloquent\BaseRepository $jobFeatureRepository */
                $jobFeatureRepository->deleteWhere(['job_id' => $job->id]);
            }
            // Save $request->job_feature
            $featureGroups = (array)$request->job_feature;
            if ($featureGroups) {
                foreach ($featureGroups as $type => $features) {
                    $case = array_keys(EType::cases());
                    if (in_array($type, $case)) {
                        $record = [];
                        foreach ((array)$features as $featureId) {
                            $record[] = [
                                'feature_type' => $type,
                                'job_id' => $job->id,
                                'feature_id' => $featureId,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }
                        /** @var \Illuminate\Database\Query\Builder $jobFeatureRepository */
                        $jobFeatureRepository->insert($record);
                    }
                }
            }
        } catch (\Exception $exception) {
            Log::error(__METHOD__.$exception->getMessage());
        }//end try
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        return false;
    }

    /**
     * @param int $id
     *
     * @return Model|null
     */
    public function findById(int $id): ?Model
    {
        $model = $this->repository->find($id);
        if ($model instanceof Model) {
            return $model;
        }

        return null;
    }

    /**
     * @return array
     */
    public function getJobCategoryOptions(): array
    {
        return $this->jobCategoryRepository->getOptions(0);
    }

    /**
     * @return array
     */
    public function getCollectionOptions(): array
    {
        return $this->collectionRepository->getOptions();
    }

    /**
     * @return array
     */
    public function getSalaryTypeOptions(): array
    {
        return [
            ['name' => __('job.field.salary.type.all'), 'value' => ESalaryType::ALL->value],
            ['name' => __('job.field.salary.type.official_staff'), 'value' => ESalaryType::OFFICIAL_STAFF->value],
            ['name' => __('job.field.salary.type.contract_staff'), 'value' => ESalaryType::CONTRACT_STAFF->value],
            ['name' => __('job.field.salary.type.part_time'), 'value' => ESalaryType::PART_TIME->value],
            [
                'name' => __('job.field.salary.type.outsourcing_staff'),
                'value' => ESalaryType::OUTSOURCING_STAFF->value
            ],
        ];
    }

    /**
     * @return array
     */
    public function getTypeOptions(): array
    {
        return [
            ['name' => __('job.field.type.hospital'), 'value' => \App\Enums\Job\EType::HOSPITAL->value],
            ['name' => __('job.field.type.dentistry'), 'value' => \App\Enums\Job\EType::DENTISTRY->value],
            ['name' => __('job.field.type.relaxation'), 'value' => \App\Enums\Job\EType::RELAXATION->value],
            ['name' => __('job.field.type.welfare'), 'value' => \App\Enums\Job\EType::WELFARE->value],
            ['name' => __('job.field.type.pharmacy'), 'value' => \App\Enums\Job\EType::PHARMACY->value],
            ['name' => __('job.field.type.home_nursing'), 'value' => \App\Enums\Job\EType::HOME_NURSING->value],
            ['name' => __('job.field.type.childcare'), 'value' => \App\Enums\Job\EType::CHILDCARE->value],
            ['name' => __('job.field.type.salon'), 'value' => \App\Enums\Job\EType::SALON->value],
            ['name' => __('job.field.type.other'), 'value' => \App\Enums\Job\EType::OTHER->value],
        ];
    }

    /**
     * @return array
     */
    public function getJobDescriptionOptions(): array
    {
        return $this->featureRepository->getListTypeOptions(EType::JOB_DESCRIPTION->value);
    }

    /**
     * @return array
     */
    public function getMedicalSubjectOptions(): array
    {
        return $this->featureRepository->getListTypeOptions(EType::MEDICAL_SUBJECTS->value);
    }

    /**
     * @return array
     */
    public function getServiceOptions(): array
    {
        return $this->featureRepository->getListTypeOptions(EType::SERVICE->value);
    }

    /**
     * @return array
     */
    public function getSalaryPayOptions(): array
    {
        return [
            ['name' => __('job.field.salary.h'), 'value' => \App\Enums\Job\ESalary::PAY_BY_H->value],
            ['name' => __('job.field.salary.m'), 'value' => \App\Enums\Job\ESalary::PAY_BY_M->value],
            ['name' => __('job.field.salary.y'), 'value' => \App\Enums\Job\ESalary::PAY_BY_Y->value],
        ];
    }

    /**
     * @return array
     */
    public function getWelfareOptions(): array
    {
        return $this->featureRepository->getListTypeOptions(EType::WELFARE->value);
    }

    /**
     * @return array
     */
    public function getHolidayOptions(): array
    {
        return $this->featureRepository->getListTypeOptions(EType::HOLIDAY->value);
    }

    /**
     * @return array
     */
    public function getRequirementsOptions(): array
    {
        return $this->featureRepository->getListTypeOptions(EType::APPLICATION_REQUIREMENTS->value);
    }

    /**
     * @return array
     */
    public function getAccessOptions(): array
    {
        return $this->featureRepository->getListTypeOptions(EType::ACCESS->value);
    }

    /**
     * @return array
     */
    public function getWorkingTimeOptions(): array
    {
        return $this->featureRepository->getListTypeOptions(EType::WORKING_TIME->value);
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function popular(int $id): bool
    {
        $model = $this->repository->find($id);
        if ($model instanceof Job) {
            $value = ($model->is_popular ? 0 : 1);
            $this->repository->update(['is_popular' => $value], $id);

            return boolval($value);
        }

        return false;
    }

    /**
     * @return array
     */
    public function getStatusOptions(): array
    {
        return [
            ['name' => __('job.field.status.show'), 'value' => \App\Enums\Job\EStatus::SHOW->value],
            ['name' => __('job.field.status.hide'), 'value' => \App\Enums\Job\EStatus::HIDE->value],
            ['name' => __('job.field.status.drafts'), 'value' => \App\Enums\Job\EStatus::DRAFTS->value],
            ['name' => __('job.field.status.show_all'), 'value' => \App\Enums\Job\EStatus::SHOW_ALL->value],
        ];
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getAllFeatureWithJobId(int $id): array
    {
        return $this->jobFeatureRepository->getAllWithJobId($id);
    }

    /**
     * @return array
     */
    public function getCityOptions(): array
    {
        return [
            ['name' => 1, 'value' => 1],
            ['name' => 2, 'value' => 2],
            ['name' => 3, 'value' => 3],
        ];
    }

    /**
     * @return array
     */
    public function getPrefectureOptions(): array
    {
        return [];
    }

    /**
     * @param string   $q
     * @param int|null $cityId
     *
     * @return array
     */
    public function suggestPrefectures(string $q, ?int $cityId): array
    {
        return $this->postalCodeRepository->suggestPrefectures($q, $cityId);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function suggestCities(int $id): array
    {
        return $this->cityRepository->suggestCities($id);
    }

    /**
     * @param int|null $lineId
     * @param int      $limit
     *
     * @return array
     */
    public function getLineOptions(?int $lineId, int $limit = 1): array
    {
        return $this->lineRepository->getOptions($lineId, $limit);
    }

    /**
     * @param int|null $stationId
     * @param int      $limit
     *
     * @return array
     */
    public function getStationOptions(?int $stationId, int $limit = 1): array
    {
        return $this->stationRepository->getOptions($stationId, $limit);
    }

    /**
     * @param string $q
     *
     * @return array
     */
    public function suggestLine(string $q): array
    {
        return $this->lineRepository->suggest($q);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function suggestStation(int $id): array
    {
        return $this->stationRepository->suggest($id);
    }

    /**
     * @param array $options
     * @param int   $value
     *
     * @return string
     */
    public function getNameOption(array $options, int $value): string
    {
        if (!$value) {
            return "";
        }
        /** @var array|null $search */
        $search = collect($options)->where('value', '=', $value)->first();
        if (is_null($search)) {
            return "";
        }

        return (string)Arr::get($search, 'name');
    }
}
