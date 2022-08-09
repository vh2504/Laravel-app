<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\UserRepository;
use App\Enums\User\ECertificate;
use App\Enums\User\EDegree;
use App\Enums\User\EExpectation;
use App\Enums\User\EJobSituation;
use App\Enums\User\EMarital;
use App\Enums\User\EPosition;
use App\Enums\User\ESex;
use App\Enums\User\EStatusUser;
use App\Enums\User\ESalaryType;
use App\Models\City;
use App\Models\Prefecture;
use App\Models\User;
use App\Models\UserDegrees;
use App\Models\UserExperience;
use Illuminate\Http\Request;

/**
 * This is class of cache
 */
class UserService
{
    /**
     * function contructer
     *
     * @param UserRepository $repository
     */
    public function __construct(
        protected readonly UserRepository $repository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function search(Request $request): array
    {
        $filters = [
            'orderBy' => $request->orderBy,
            'orderType' => $request->orderType,
        ];
        if (!empty($request->status)
            && in_array($request->status, [EStatusUser::Active->value, EStatusUser::InActive->value])
            ) {
            $filters['status'] = (int)$request->status;
        }

        if (!empty($request->email)) {
            $filters['email'] = $request->email;
        }

        $data['users'] = $this->repository->with(['getJobApplyIds'])->search($filters, false);
        $data['request'] = $request;
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return null
     */
    public function export(Request $request)
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'
            . (string)__('user.label.export.file_name') . (string)date("Ymd") . '.csv' . '"');

        $firstRow = $this->getFirstRow();
        echo(implode(',', $firstRow));
        echo "\r\n";

        $filters = [];
        if (!empty($request->status)
            && in_array($request->status, [EStatusUser::Active->value, EStatusUser::InActive->value])
            ) {
            $filters['status'] = (int)$request->status;
        }

        if (!empty($request->email)) {
            $filters['email'] = $request->email;
        }

        $users = $this->repository->with([
            'getJobApplyIds', 'getUserAddress',
            'getUserDegrees', 'getUserExperience', 'getUserJobDesine'
            ])->search($filters, true);

        /** @var User $user */
        foreach ($users as $user) {
            $row = [];

            $row =  array_merge($row, $this->getUserInfo($user));
            
            $row =  array_merge($row, $this->getUserDegrees($user));
            
            $row = array_merge($row, $this->getUserExperience($user));

            $row = array_merge($row, $this->getUserJobDesine($user));

            echo(implode(',', (array)$row));
            echo "\r\n";
        }//end foreach
        return null;
    }

    /**
     * Show function
     *
     * @param int $id
     * @return array<string, mixed>
     */
    public function show(int $id) : array
    {
        $listDegreeOption = EDegree::cases();
        $listCertificate = ECertificate::cases();
        $listPosition = EPosition::cases();
        $listJobSituation = EJobSituation::cases();
        $listSex = ESex::cases();
        
        $data['user'] = $this->repository->with([
            'getUserDegrees', 'getUserExperience', 'getUserJobApplys', 'getUserJobDesine'
            ])->find($id);
        $data['id'] = $id;
        $data['listDegreeOption'] = $listDegreeOption;
        $data['listCertificate'] = $listCertificate;
        $data['listPosition'] = $listPosition;
        $data['listJobSituation'] = $listJobSituation;
        $data['listSex'] = $listSex;

        return $data;
    }

    /**
     * changeStatus function
     *
     * @param int $id
     * @param int $status
     * @return array<string, mixed>
     */
    public function changeStatus(int $id, int $status) : array
    {
        if (!in_array($status, [EStatusUser::Active->value, EStatusUser::InActive->value])) {
            return [
                'status' => 400,
                'message' => 'error'
            ];
        }

        $user = [
            'status' => (int)$status,
        ];

        if ($status == EStatusUser::Active->value) {
            $msg = __('user.msg.active-success');
        } else {
            $msg = __('user.msg.inactive-success');
        }

        return [
            'status' => 200,
            'user' => $this->repository->update($user, $id),
            'message' => $msg
        ];
    }

    /**
     * changeStatus function
     *
     * @return array<int, mixed>
     */
    public function getFirstRow() : array
    {
        $label = "user.label.export.";
        $columns = [
            (string)__("{$label}id"),
            (string)__("{$label}name"),
            (string)__("{$label}name_hira"),
            (string)__("{$label}birthday"),
            (string)__("{$label}sex"),
            (string)__("{$label}zipcode"),
            (string)__("{$label}address"),
            (string)__("{$label}address_hira"),
            (string)__("{$label}number_phone"),
            (string)__("{$label}email"),
            (string)__("{$label}zipcode2"),
            (string)__("{$label}address2"),
            (string)__("{$label}address_hira2"),
            (string)__("{$label}number_phone2"),
            (string)__("{$label}email2"),
            (string)__("{$label}note"),
            (string)__("{$label}job_situation"),
            (string)__("{$label}dependant"),
            (string)__("{$label}marital_status"),
            (string)__("{$label}picture"),
            (string)__("{$label}info"),

            (string)__("{$label}degrees_type"),
            (string)__("{$label}school_name"),
            (string)__("{$label}department"),
            (string)__("{$label}major"),
            (string)__("{$label}degree"),
            (string)__("{$label}graduation_date"),
        ];

        $labelJob = (string)__("{$label}job");
        for ($i = 1; $i < 6; $i++) {
            $columns[] = "{$labelJob}{$i}/" . (string)__("{$label}company_name");
            $columns[] = "{$labelJob}{$i}/" . (string)__("{$label}job_content");
            $columns[] = "{$labelJob}{$i}/" . (string)__("{$label}start");
            $columns[] = "{$labelJob}{$i}/" . (string)__("{$label}end");
            $columns[] = "{$labelJob}{$i}/" . (string)__("{$label}job_situation");
            $columns[] = "{$labelJob}{$i}/" . (string)__("{$label}job_category_id");
            $columns[] = "{$labelJob}{$i}/" . (string)__("{$label}salary");
            $columns[] = "{$labelJob}{$i}/" . (string)__("{$label}position");
        }

        $columns[] = (string)__("{$label}job_desine.category");
        $columns[] = (string)__("{$label}job_desine.address");
        $columns[] = (string)__("{$label}job_desine.job_situation");
        $columns[] = (string)__("{$label}job_desine.start_date");
        $columns[] = (string)__("{$label}job_desine.salary");
        $columns[] = (string)__("{$label}job_desine.feature");
        
        return $columns;
    }

    /**
     * get User info function
     *
     * @param User $user
     * @return array<string, mixed>
     */
    public function getUserInfo(User $user) : array
    {
        $row['id'] = $user->id;
        $row['name'] = "{$user->first_name} {$user->last_name}";
        $row['name_hira'] = isset($user->first_name_hira, $user->last_name_hira)
            ? "{$user->first_name_hira} {$user->last_name_hira}"
            : null;
        $row['birthday'] = isset($user->birthday) ? $user->birthday : null;
        /** @var ESex $sex */
        $sex = $user->sex;
        $row['sex'] = empty($user->sex) ? null : (string)__('user.label.detail.' . strtolower($sex->name));

        $row =  array_merge($row, $this->getUserAddress($user));

        $row['note'] = $user->note;

        /** @var EJobSituation $jobSituation */
        $jobSituation = $user->job_situation;
        $row['job_situation'] = empty($user->job_situation) ? null
            : (string)__('user.label.detail.job_situation_option.'
            . strtolower($jobSituation->name));
        
        $row['dependant'] = $user->dependant;

        /** @var EMarital $marital */
        $marital = $user->marital_status;
        $row['marital_status'] = empty($user->marital_status) ? null
            : (string)__('user.label.detail.marital.' . strtolower($marital->name));
        
        $row['picture'] = (string)$user->picture;
        $row['info'] = (string)$user->info;

        return $row;
    }

    /**
     * getUserAddress function
     *
     * @param User $user
     * @return array<string, mixed>
     */
    public function getUserAddress(User $user) : array
    {
        $listAddress = $user->getUserAddress;
        $row = [];
        for ($i = 0; $i < 2; $i++) {
            $key = $i + 1;
            if (isset($listAddress[$i])) {
                $address = $listAddress[$i];
                $row["postal_code{$key}"] = $address->postal_code;
                $row["address{$key}"] = "";

                /** @var Prefecture $prefecture */
                $prefecture = $address->prefecture()->first();
                if (!empty($prefecture->name)) {
                    $row["address{$key}"] = $prefecture->name;
                }

                /** @var City $city */
                $city = $address->city()->first();
                if (!empty($city->name)) {
                    $row["address{$key}"] = $row["address{$key}"] . $city->name;
                }

                $row["address{$key}"] = $row["address{$key}"] . $address->address . $address->town;
                $row["address_hira{$key}"] = $address->address_hira;
                $row["number_phone{$key}"] = $address->number_phone;
                if ($key == 1) {
                    $row["email{$key}"] = $user->email;
                } else {
                    $row["email{$key}"] = $user->email2;
                }
            } else {
                $row["postal_code{$key}"] = null;
                $row["address{$key}"] = null;
                $row["address_hira{$key}"] = null;
                $row["number_phone{$key}"] = null;
                $row["email{$key}"] = null;
            }//end if
        }//end for

        return $row;
    }

    /**
     * getUserDegrees function
     *
     * @param User $user
     * @return array<string, mixed>
     */
    public function getUserDegrees(User $user) : array
    {
        /** @var UserDegrees $degree */
        $degree = $user->getUserDegrees;
        $row['degrees_type'] = empty($degree->degrees_type) ? null
            : (string)__('user.label.detail.certificate_type_option.'
            . strtolower($degree->degrees_type->name));
        $row['school_name'] = $degree->school_name ?? null;
        $row['department'] = $degree->department ?? null;
        $row['major'] = $degree->major ?? null;
        $row['degree'] = empty($degree->degree)
            ? null : (string)__('user.label.detail.degree_option.' . strtolower($degree->degree->name));
        $row['graduation'] = empty($degree->graduation_year) && empty($degree->graduation_month)
            ? null : $degree->graduation_year . '/' . $degree->graduation_month;

        return $row;
    }

    /**
     * getUserJobDesine function
     *
     * @param User $user
     * @return array<string, mixed>
     */
    public function getUserJobDesine(User $user) : array
    {
        $row['jobCategories'] = null;
        $row['jobDesineCities'] = null;
        $row['jobDesineSituation'] = null;
        $row['expectation'] = null;
        $row['salary'] = null;
        $row['jobDesineFeatures'] = null;
        
        $userJobDesine = $user->getUserJobDesine->first();
        if (!empty($userJobDesine)) {
            $jobCategories = $userJobDesine->getJobCategory()->get();
            $row['jobCategories'] = "\"";
            foreach ($jobCategories as $category) {
                $row['jobCategories'] = $row['jobCategories'] . $category->name . "\n";
            }
            $row['jobCategories'] = $row['jobCategories'] . "\"";
    
            $jobDesineCities = $userJobDesine->getJobDesineCity()->get();
            $row['jobDesineCities'] = "\"";
            foreach ($jobDesineCities as $city) {
                $row['jobDesineCities'] = $row['jobDesineCities'] . $city->name  . "\n";
            }
            $row['jobDesineCities'] = $row['jobDesineCities'] . "\"";
    
            $jobDesineSituation = $userJobDesine->getUserJobDesineSituation()->get();
            $row['jobDesineSituation'] = "\"";

            foreach ($jobDesineSituation as $jobSituationItem) {
                /** @var EJobSituation $jobSituation */
                $jobSituation = $jobSituationItem['job_situation'];
                $row['jobDesineSituation'] = $row['jobDesineSituation']
                    . (string)__('user.label.detail.job_situation_option.'
                    . strtolower($jobSituation->name)) . "\n";
            }
            $row['jobDesineSituation'] = $row['jobDesineSituation'] . "\"";
    
            /** @var EExpectation $expectation */
            $expectation = $userJobDesine->expectation;
            $row['expectation'] = (string)__('user.label.detail.job_desine.expectation_option.'
                . strtolower($expectation->name));
            $row['salary'] = $userJobDesine->salary;
    
            $jobDesineFeatures = $userJobDesine->getJobDesineFeatures()->get();
            $row['jobDesineFeatures'] = "\"";
            foreach ($jobDesineFeatures as $feature) {
                $row['jobDesineFeatures'] = $row['jobDesineFeatures'] . $feature->name  . "\n";
            }
            $row['jobDesineFeatures'] = $row['jobDesineFeatures'] . "\"";
        }//end if

        return $row;
    }

    /**
     * getUserExperience function
     *
     * @param User $user
     * @return array<string, mixed>
     */
    public function getUserExperience(User $user) : array
    {
        $experiences = $user->getUserExperience;

        $row = [];
        for ($i = 0; $i < 5; $i++) {
            $key = $i + 1;
            if (isset($experiences[$i])) {
                /** @var UserExperience $experience */
                $experience = $experiences[$i];
                $row["company_name{$key}"] = $experience->company_name;
                
                $row["start{$key}"] = $experience->start_year . "/" . $experience->start_month;
                $row["end{$key}"] = $experience->end_year . "/" . $experience->end_month;

                /** @var EJobSituation $jobSituation */
                $jobSituation = $experience->job_situation;
                $row["job_situation{$key}"] = empty($experience->job_situation) ? null
                    : $jobSituation->name;
                
                $row["job_category_id{$key}"] = $experience->job_category_id;
                
                /** @var ESalaryType $salaryType */
                $salaryType = $experience->salary_type;
                $row["salary{$key}"] = empty($experience->salary_type) ? null
                    : (string)(__('user.label.detail.salary_type.'. strtolower($salaryType->name)));

                if (empty($row["salary{$key}"]) && empty($experience->salary)) {
                    $row["salary{$key}"] = $row["salary{$key}"] . $experience->salary;
                    $row["salary{$key}"] = $row["salary{$key}"]
                        . (string)__('user.label.detail.job_desine.salary_unit');
                }

                /** @var EPosition $position */
                $position = $experience->position;
                $row["position{$key}"] = empty($experience->position) ? null : $position->name;
                $row["job_content{$key}"] = $experience->job_content;
            } else {
                $row["company_name{$key}"] = null;
                $row["start{$key}"] = null;
                $row["end{$key}"] = null;
                $row["job_situation{$key}"] = null;
                $row["job_category_id{$key}"] = null;
                $row["salary{$key}"] = null;
                $row["position{$key}"] = null;
                $row["job_content{$key}"] = null;
            }//end if
        }//end for

        return $row;
    }
}
