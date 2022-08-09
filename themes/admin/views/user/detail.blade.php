@extends('layouts.app', [
    'title' => __('User Management'),
    'parentSection' => 'laravel',
    'elementName' => 'user-management'
])

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="mb-0">{{ __('user.label.detail.title') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="col-8 center">
                                <h3 class="mt-5 mb-3">{{ __('user.label.detail.basic-info') }}</h3>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.image') }}</label> 
                                            <img height="100px" src="{{ $user->picture ?: asset('/admin/img/default_avatar.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.name') }}</label> 
                                            <span class="user-content col-9">{{ $user->name }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.first_name_hira') }}</label> 
                                            <span class="user-content col-9">{{ $user->first_name_hira }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.email') }}</label> 
                                            <span class="user-content col-9">{{ $user->email }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.sex') }}</label>
                                            <span class="user-content col-9">
                                                @if(isset($user->sex->value))
                                                    @foreach($listSex as $item)
                                                        @if($user->sex->value == $item->value)
                                                            {{ __('user.label.detail.' . strtolower($item->name)) }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.birthday_year') }}</label> 
                                            <span class="user-content col-9">
                                            @show_date($user->birthday)
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_situation') }}</label> 
                                            <span class="user-content col-9">
                                                @if(isset($user->job_situation->value))
                                                    @foreach($listJobSituation as $item)
                                                        @if($user->job_situation->value == $item->value)
                                                            {{ __('user.label.detail.job_situation_option.' . strtolower($item->name)) }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.zipcode') }}</label> 
                                            <span class="user-content col-9">{{ $user->zipcode }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.number_phone') }}</label> 
                                            <span class="user-content col-9">{{ $user->number_phone }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.station') }}</label> 
                                            <span class="user-content col-9"></span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.dependant') }}</label> 
                                            @if(!empty($user->dependant))
                                            <span class="user-content col-9">{{ __('user.label.detail.dependant_yes') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.count_job_apply') }}</label> 
                                            <span class="user-content col-9">{{ count($user->getUserJobApplys()->get()) }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.created_at') }}</label> 
                                            <span class="user-content col-9">
                                                @show_date($user->created_at)
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.address') }}</label> 
                                            <span class="user-content col-9">{{ $user->address }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.info') }}</label> 
                                            <span class="user-content col-9">{{ $user->info }}</span>
                                        </div>
                                    </div>

                                    <h3 class="col-12 mt-5 mb-3">{{ __('user.label.detail.education') }}</h3><br>
                                    @if(!empty($user->getUserDegrees))
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.certificate_type') }}</label> 
                                            <span class="user-content col-9">
                                                @if(isset($user->getUserDegrees->degree_type->value))
                                                    @foreach($listCertificate as $item)
                                                        @if($user->getUserDegrees->degree_type->value == $item->value)
                                                            {{ __('user.label.detail.certificate_type_option.' . strtolower($item->name)) }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                            
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.school_name') }}</label> 
                                            <span class="user-content col-9">{{ $user->getUserDegrees->school_name }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.department') }}</label> 
                                            <span class="user-content col-9">{{ $user->getUserDegrees->department }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.major') }}</label> 
                                            <span class="user-content col-9">{{ $user->getUserDegrees->major }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.degree') }}</label> 
                                            <span class="user-content col-9">
                                                @if(isset($user->getUserDegrees->degree->value))
                                                    @foreach($listDegreeOption as $item)
                                                        @if($user->getUserDegrees->degree->value == $item->value)
                                                            {{ __('user.label.detail.degree_option.' . strtolower($item->name)) }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.graduation') }}</label> 
                                            <span class="user-content col-9">{{ $user->getUserDegrees->graduation_year }}/{{ $user->getUserDegrees->graduation_month }}</span>
                                        </div>
                                    </div>
                                    @endif

                                    <h2 class="col-12 mt-5">{{ __('user.label.detail.experience') }}</h2><br>
                                    @foreach($user->getUserExperience()->get() as $key => $experience)
                                        <h3 class="col-12 mt-3 mb-2">{{ __('user.label.detail.experience_no') }} {{ $key + 1 }}</h3><br>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-control-label user-label col-3">{{ __('user.label.detail.company_name') }}</label> 
                                                <span class="user-content col-9">{{ $experience->company_name }}</span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-control-label user-label col-3">{{ __('user.label.detail.start_date') }}</label> 
                                                <span class="user-content col-9">{{ $experience->start_year }}/{{ $experience->start_month }}</span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-control-label user-label col-3">{{ __('user.label.detail.end_date') }}</label> 
                                                <span class="user-content col-9">{{ $experience->end_year }}/{{ $experience->end_month }}</span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_situation') }}</label>
                                                <span class="user-content col-9">
                                                    @if(isset($experience->job_situation->value))
                                                        @foreach($listJobSituation as $item)
                                                            @if($experience->job_situation->value == $item->value)
                                                                {{ __('user.label.detail.job_situation_option.' . strtolower($item->name)) }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_category') }}</label>
                                                @if(isset($experience->getCategory))
                                                <span class="user-content col-9">{{ $experience->getCategory()->first()->name }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-control-label user-label col-3">{{ __('user.label.detail.salary') }}</label> 
                                                <span class="user-content col-9">{{ $experience->salary }}</span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-control-label user-label col-3">{{ __('user.label.detail.position') }}</label>
                                                <span class="user-content col-9">
                                                    @if(isset($experience->position->value))
                                                        @foreach($listPosition as $item)
                                                            @if($experience->position->value == $item->value)
                                                                {{ __('user.label.detail.position_option.' . strtolower($item->name)) }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_content') }}</label> 
                                                <span class="user-content col-9">{{ $experience->job_content }}</span>
                                            </div>
                                        </div>
                                    @endforeach

                                    <h3 class="col-12 mt-5 mb-3">{{ __('user.label.detail.feature') }}</h3><br>
                                    <?php $jobDesine = $user->getUserJobDesine()->first(); ?>

                                    @if(!empty($jobDesine))
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_desine.category_title') }}</label> 
                                            <span class="user-content col-9">
                                                <div class="row">
                                                    @if(isset($jobDesine->getJobCategory))
                                                        @foreach($jobDesine->getJobCategory()->get() as $category)
                                                            <span class="col-12">{{ $category->name }}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </span>
                                        </div>

                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_desine.address') }}</label> 
                                            <span class="user-content col-9">
                                                <div class="row">
                                                    @foreach($jobDesine->getJobDesineCity()->get() as $city)
                                                        <span class="col-12">{{ $city->city_ja }}</span>
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>

                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_desine.job_situation') }}</label> 
                                            <span class="user-content col-9">
                                                <div class="row">

                                                    @if(isset($situation->job_situation->name))
                                                        @foreach($jobDesine->getJobDesineSituation()->get() as $situation)
                                                            <span class="col-12">
                                                                {{ __('user.label.detail.job_situation_option.' . strtolower($situation->job_situation->name)) }}
                                                            </span>
                                                            
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </span>
                                        </div>

                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_desine.expectation') }}</label> 
                                            <span class="user-content col-9">
                                                @if(isset($jobDesine->expectation->name))
                                                    {{ __('user.label.detail.job_desine.expectation_option.' . strtolower($jobDesine->expectation->name)) }}
                                                @endif
                                            </span>
                                        </div>

                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_desine.salary') }}</label> 
                                            @if(!empty($jobDesine->salary))
                                            <span class="user-content col-9">{{ $jobDesine->salary }}{{ __('user.label.detail.job_desine.salary_unit') }}</span>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <label class="form-control-label user-label col-3">{{ __('user.label.detail.job_desine.feature') }}</label> 
                                            <span class="user-content col-9">
                                                <div class="row">
                                                    @foreach($jobDesine->getJobDesineFeatures()->get() as $feature)
                                                        <span class="col-12">{{ $feature->name }}</span>
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                                <?php $listJob = $user->getUserJobApplys()->paginate(\App\Enums\EPaginate::LIMIT->value); ?>
                                <h3 class="col-12 mt-5 p-0">{{ __('user.label.detail.job_apply') }}: {{ $listJob->total() }}</h3><br>
                                <div class="table-responsive py-4" id="items-table">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="col-2 table-job-apply">{{ __('user.label.detail.job_name') }}</th>
                                                <th scope="col" class="col-2 table-job-apply">{{ __('user.label.detail.job_type') }}</th>
                                                <th scope="col" class="col-2 table-job-apply">{{ __('user.label.detail.office_name') }}</th>
                                                <th scope="col" class="col-2 table-job-apply">{{ __('user.label.detail.job_address') }}</th>
                                                <th scope="col" class="col-2 table-job-apply">{{ __('user.label.detail.job_salary') }}</th>
                                                <th scope="col" class="col-2 table-job-apply">{{ __('user.label.detail.apply_time') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listJob as $key => $job)
                                            <tr id="record-{{ $user->id }}">
                                                <td>
                                                    {{ $job->title }}
                                                </td>
                                                <td>
                                                    {{ $job->title }}
                                                </td>
                                                <td>
                                                    db chưa có
                                                </td>
                                                <td>
                                                    db chưa có
                                                </td>
                                                <td>
                                                    cần confirm lại cách lưu
                                                </td>
                                                <td>
                                                    {{ $job->title }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $listJob->withQueryString()->links('vendor.pagination.default') }}
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection