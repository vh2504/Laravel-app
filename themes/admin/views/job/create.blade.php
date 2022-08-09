@extends('layouts.app', [
    'title' => __('Job management'),
    'parentSection' => 'jobs',
    'elementName' => 'jobs'
])
@section('title', __('job.form.header'))
@php
    /** @var \App\Services\Admin\JobService  $service */
    $index = 1;
@endphp
@section('content')
    <div class="container-fluid mt-4">
        <form method="post" action="{{route('admin.job.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">{{ __('job.field.image.label') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image-preview" name="image[]" accept="image/*" multiple="multiple">
                                                <label class="custom-file-label" for="customFileLang">{{ __('job.field.image.button') }}</label>
                                            </div>
                                            @include('alerts.feedback', ['field' => 'image'])
                                        </div>
                                        <div class="col-md-12 mt-2" id="preview-area"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card-wrapper">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('job.form.header') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">{{ __('job.field.title.label') }}
                                                <span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" name="title" id="input-name"
                                                    class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                    maxlength="255"
                                                    value="{{old('title','')}}"
                                                    autofocus
                                                >
                                                @include('alerts.feedback', ['field' => 'title'])
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">
                                                {{ __('job.field.type.label') }}
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="type">
                                                    @foreach($service->getTypeOptions() as $type)
                                                        <option value="{{ $type['value'] }}">{{ $type['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @include('alerts.feedback', ['field' => 'type'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">
                                                {{ __('job.field.status.label') }}
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                                                    <option value="" selected disabled>{{__('job.field.status.placeholder')}}</option>
                                                    @foreach($service->getStatusOptions() as $status)
                                                        <option value="{{ $status['value'] }}">{{ $status['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @include('alerts.feedback', ['field' => 'status'])
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">{{ __('job.field.office_name.label') }}
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" name="office_name" id="input-name"
                                                    class="form-control{{ $errors->has('office_name') ? ' is-invalid' : '' }}"
                                                    maxlength="255"
                                                    value="{{old('office_name','')}}"
                                                >
                                                @include('alerts.feedback', ['field' => 'office_name'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <hr/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">{{ __('job.field.postal_code.label') }}
                                                <span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" name="postal_code" id="input-name"
                                                    class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}"
                                                    maxlength="20"
                                                    value="{{old('postal_code','')}}"
                                                    data-url="{{ route('admin.job.suggest.prefecture') }}"
                                                >
                                                @include('alerts.feedback', ['field' => 'postal_code'])
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">
                                                {{ __('job.field.city_id.label') }}
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control {{ $errors->has('city_id') ? ' is-invalid' : '' }}" name="city_id">
                                                </select>
                                                @include('alerts.feedback', ['field' => 'city_id'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">
                                                {{ __('job.field.prefecture_id.label') }}
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control {{ $errors->has('prefecture_id') ? ' is-invalid' : '' }}" name="prefecture_id" data-url="{{ route('admin.job.suggest.city') }}">
                                                    <option value="" selected disabled>{{__('job.field.prefecture_id.placeholder')}}</option>
                                                </select>
                                                @include('alerts.feedback', ['field' => 'prefecture_id'])
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label form-control-label">
                                                {{ __('job.field.office_address.label') }}
                                            </label>
                                            <div class="col-md-9">
                                                <textarea name="office_address" class="form-control {{ $errors->has('office_address') ? ' is-invalid' : '' }}"></textarea>
                                                @include('alerts.feedback', ['field' => 'office_address'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <hr/>
                                    </div>
                                    <div id="area-station" class="col-md-12">
                                        @include('job._station_item_empty')
                                    </div>
                                    <div class="col-lg-12">
                                        <hr/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-md-1 col-form-label form-control-label">
                                                {{ __('job.field.content.title') }}
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-11">
                                                <input type="text" name="content[title]" id="input-name"
                                                    class="form-control{{ $errors->has('content.title') ? ' is-invalid' : '' }}"
                                                    maxlength="255"
                                                    value="{{old('content[title]','')}}">
                                                @include('alerts.feedback', ['field' => 'content.title'])
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1 col-form-label form-control-label">
                                                {{ __('job.field.content.text') }}
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-11">
                                                <textarea name="content[text]" class="form-control {{ $errors->has('content.text') ? ' is-invalid' : '' }}"></textarea>
                                                @include('alerts.feedback', ['field' => 'content.text'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <h2>{{ __('job.heading.job_content') }}</h2>
                                        <h3 class="mt-5">{{ __('job.heading.job_type') }}</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label form-control-label">
                                                        {{ __('job.field.collection_id.label') }}
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="form-control {{ $errors->has('collection_id') ? ' is-invalid' : '' }}" name="collection_id">
                                                            <option value="" selected disabled>{{__('job.field.collection_id.placeholder')}}</option>
                                                            @foreach($service->getCollectionOptions() as $collection)
                                                                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @include('alerts.feedback', ['field' => 'collection_id'])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label form-control-label">
                                                        {{ __('job.field.category_id.label') }}
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id">
                                                            <option value="" selected disabled>{{__('job.field.category_id.placeholder')}}</option>
                                                            @foreach($service->getJobCategoryOptions() as $category)
                                                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        @include('alerts.feedback', ['field' => 'category_id'])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-12 col-form-label form-control-label">{{ __('job.field.content.note') }}</label>
                                                    <div class="col-md-12">
                                                        <textarea name="content[note]" class="form-control {{ $errors->has('content.note') ? ' is-invalid' : '' }}"></textarea>
                                                        @include('alerts.feedback', ['field' => 'content.note'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr/>
                                        <h3>{{ __('job.heading.job_description') }}
                                            <span class="required">*</span>
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($service->getJobDescriptionOptions() as $feature)
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="job_feature[{{ \App\Enums\Feature\EType::JOB_DESCRIPTION->value }}][]" value="{{ $feature->id }}" id="dfi_{{ $feature->id }}">
                                                                <label class="form-check-label" for="dfi_{{ $feature->id }}">{{ $feature->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @include('alerts.feedback', ['field' => 'job_feature.'.(\App\Enums\Feature\EType::JOB_DESCRIPTION->value)])
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-12 col-form-label form-control-label">{{ __('job.field.description.text') }}</label>
                                                    <div class="col-md-12">
                                                        <textarea name="description[text]" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                @include('alerts.feedback', ['field' => 'description.text'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h3>{{ __('job.field.service_form.medical_subjects') }}</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($service->getMedicalSubjectOptions() as $feature)
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="job_feature[{{ \App\Enums\Feature\EType::MEDICAL_SUBJECTS->value }}][]" value="{{ $feature->id }}" id="msms_{{ $feature->id }}">
                                                                <label class="form-check-label" for="msms_{{ $feature->id }}">{{ $feature->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <h3>{{ __('job.field.service_form.service') }}</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($service->getServiceOptions() as $feature)
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="job_feature[{{ \App\Enums\Feature\EType::SERVICE->value }}][]" value="{{ $feature->id }}" id="mssi_{{ $feature->id }}">
                                                                <label class="form-check-label" for="mssi_{{ $feature->id }}">{{ $feature->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-5">
                                        <h3>{{ __('job.field.salary.heading') }}</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label form-control-label">{{ __('job.field.salary.type.header') }}
                                                        <span class="required">*</span></label>
                                                    <div class="col-md-8">
                                                        <select class="form-control {{ $errors->has('salary.type') ? ' is-invalid' : '' }}" name="salary[type]">
                                                            @foreach($service->getSalaryTypeOptions() as $type)
                                                                <option @if(($request->type ?? '') == $type['value']) selected @endif value="{{$type['value']}}">
                                                                    {{$type['name']}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @include('alerts.feedback', ['field' => 'salary.type'])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 col-form-label form-control-label">{{ __('job.field.salary.pay') }}
                                                                <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <select class="form-control {{ $errors->has('salary.pay') ? ' is-invalid' : '' }}" name="salary[pay]">
                                                                    @foreach($service->getSalaryPayOptions() as $type)
                                                                        <option @if(($request->salary ?? '') == $type['value']) selected @endif value="{{$type['value']}}">
                                                                            {{$type['name']}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @include('alerts.feedback', ['field' => 'salary.pay'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label form-control-label">{{ __('job.field.salary.min') }}
                                                                <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="salary[min]" id="input-name"
                                                                    class="form-control{{ $errors->has('salary.min') ? ' is-invalid' : '' }}"
                                                                    maxlength="255"
                                                                    value="{{old('salary[min]','')}}">
                                                                @include('alerts.feedback', ['field' => 'salary.min'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label form-control-label">~</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="salary[max]" id="input-name"
                                                                    class="form-control{{ $errors->has('salary.max') ? ' is-invalid' : '' }}"
                                                                    maxlength="255"
                                                                    value="{{old('salary[max]','')}}">
                                                                @include('alerts.feedback', ['field' => 'salary.max'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-12 col-form-label form-control-label">{{ __('job.field.salary.note') }}</label>
                                                            <div class="col-md-12">
                                                                <textarea name="salary[note]" class="form-control {{ $errors->has('salary.note') ? ' is-invalid' : '' }}"></textarea>
                                                                @include('alerts.feedback', ['field' => 'salary.note'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <h3>{{ __('job.field.treatment.heading') }}</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($service->getWelfareOptions() as $feature)
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="job_feature[{{ \App\Enums\Feature\EType::WELFARE->value }}][]" value="{{ $feature->id }}" id="tfi_{{ $feature->id }}">
                                                                <label class="form-check-label" for="tfi_{{ $feature->id }}">{{ $feature->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-12 col-form-label form-control-label">{{ __('job.field.treatment.note') }}</label>
                                                    <div class="col-md-12">
                                                        <textarea name="treatment[note]" class="form-control {{ $errors->has('treatment.note') ? ' is-invalid' : '' }}"></textarea>
                                                        @include('alerts.feedback', ['field' => 'treatment.note'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <h3>{{ __('job.field.working_time.heading') }}
                                            <span class="required">*</span>
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($service->getWorkingTimeOptions() as $feature)
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="job_feature[{{ \App\Enums\Feature\EType::WORKING_TIME->value }}][]" value="{{ $feature->id }}" id="wtfi_{{ $feature->id }}">
                                                                <label class="form-check-label" for="wtfi_{{ $feature->id }}">{{ $feature->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @include('alerts.feedback', ['field' => 'job_feature.'.(\App\Enums\Feature\EType::WORKING_TIME->value)])
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-12 col-form-label form-control-label">
                                                        {{ __('job.field.working_time.note') }}
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <textarea name="working_time[note]" class="form-control {{ $errors->has('working_time.note') ? ' is-invalid' : '' }}"></textarea>
                                                        @include('alerts.feedback', ['field' => 'working_time.note'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <h3>
                                            {{ __('job.field.holiday.heading') }}
                                            <span class="required">*</span>
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($service->getHolidayOptions() as $feature)
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="job_feature[{{ \App\Enums\Feature\EType::HOLIDAY->value }}][]" value="{{ $feature->id }}" id="hfi_{{ $feature->id }}">
                                                                <label class="form-check-label" for="hfi_{{ $feature->id }}">{{ $feature->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="col-sm-12">
                                                        @include('alerts.feedback', ['field' => 'job_feature.'.(\App\Enums\Feature\EType::HOLIDAY->value)])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label form-control-label">{{ __('job.field.holiday.note') }}</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="holiday[note]" id="input-name"
                                                            class="form-control{{ $errors->has('holiday.note') ? ' is-invalid' : '' }}"
                                                            maxlength="255"
                                                            value="{{old('holiday[note]','')}}">
                                                        @include('alerts.feedback', ['field' => 'holiday.note'])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label form-control-label">{{ __('job.field.holiday.offline') }}</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="name" id="input-name"
                                                            class="form-control{{ $errors->has('holiday.offline') ? ' is-invalid' : '' }}"
                                                            maxlength="255"
                                                            value="{{old('holiday[offline]','')}}"
                                                            autofocus>
                                                        @include('alerts.feedback', ['field' => 'holiday.offline'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <h3>
                                            {{ __('job.field.requirement.heading') }}
                                            <span class="required">*</span>
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($service->getRequirementsOptions() as $feature)
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="job_feature[{{ \App\Enums\Feature\EType::APPLICATION_REQUIREMENTS->value }}][]" value="{{ $feature->id }}" id="rfi_{{ $feature->id }}">
                                                                <label class="form-check-label" for="rfi_{{ $feature->id }}">{{ $feature->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @include('alerts.feedback', ['field' => 'job_feature.'.(\App\Enums\Feature\EType::APPLICATION_REQUIREMENTS->value)])
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-12 col-form-label form-control-label">
                                                        {{ __('job.field.requirement.note') }}
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <textarea name="requirement[note]" class="form-control {{ $errors->has('requirement.note') ? ' is-invalid' : '' }}"></textarea>
                                                        @include('alerts.feedback', ['field' => 'requirement.note'])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-12 col-form-label form-control-label">{{ __('job.field.requirement.priority') }}</label>
                                                    <div class="col-md-12">
                                                        <textarea name="requirement[priority]" class="form-control"></textarea>
                                                        @include('alerts.feedback', ['field' => 'requirement.priority'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <h3>{{ __('job.field.address.heading') }}</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($service->getAccessOptions() as $feature)
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="job_feature[{{ \App\Enums\Feature\EType::ACCESS->value }}][]" value="{{ $feature->id }}" id="afi_{{ $feature->id }}">
                                                                <label class="form-check-label" for="afi_{{ $feature->id }}">{{ $feature->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <h3>
                                            {{ __('job.field.process.heading') }}
                                            <span class="required">*</span>
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-12 col-form-label form-control-label">{{ __('job.field.process.label') }}</label>
                                                    <div class="col-md-12">
                                                        <textarea name="process" class="form-control {{ $errors->has('process') ? ' is-invalid' : '' }}"></textarea>
                                                        @include('alerts.feedback', ['field' => 'process'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between m-auto" style="width:320px">
                                    <a href="{{route('admin.job.index')}}">
                                        <button type="button" style="border-radius:20px; width:150px" class=" btn btn-outline-danger">{{ __('job.form.button.reset') }}</button>
                                    </a>
                                    <button type="submit" style="border-radius:20px; width:150px" class=" btn btn-primary">{{ __('job.form.button.save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @include('layouts.footers.auth')
    </div>
@endsection