@extends('layouts.app', [
    'title' => __('Job collection management'),
    'parentSection' => 'jobs',
    'elementName' => 'jobs'
])
@section('title', __('job.list'))
@php $jobCategoryOptions = $service->getJobCategoryOptions(); @endphp
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center ">
                            <div class="col-4">
                                <h3 class="mb-0">{{ __('job.list') }}</h3>
                            </div>
                            <div class="col-8 w-100 text-right">
                                <form method="get" class="block-create-list form-search" action="{{route('admin.job.index')}}">
                                    <div class="d-flex ">
                                        <div class="col-2">
                                            <div class="input-group input-group-alternative input-group-merge">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                <input type="text" class="form-control" name="search" maxlength="255"
                                                    value="{{ $request->search }}"
                                                    placeholder="{{ __('job.form.filter.search.placeholder') }}">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <select class="form-control" name="job_category" aria-placeholder="{{__('job.field.category_id.label')}}">
                                                <option value="" selected disabled>{{__('job.field.category_id.placeholder')}}</option>
                                                @foreach($jobCategoryOptions as $category)
                                                    <option @if(($request->job_category ?? '') == $category['id']) selected @endif value="{{$category['id']}}">
                                                        {{$category['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <select class="form-control" name="salary_type" aria-placeholder="{{__('job.field.type.label')}}">
                                                <option value="" selected disabled>{{__('job.field.type.label')}}</option>
                                                @foreach($service->getSalaryTypeOptions() as $type)
                                                    <option @if(($request->salary_type ?? '') == $type['value']) selected @endif value="{{$type['value']}}">
                                                        {{$type['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <select class="form-control" name="status" aria-placeholder="{{__('job.field.status.label')}}">
                                                <option value="" selected disabled>{{__('job.field.status.option_default')}}</option>
                                                @foreach($service->getStatusOptions() as $type)
                                                    <option @if(($request->status ?? '') == $type['value']) selected @endif value="{{$type['value']}}">
                                                        {{$type['name'] , $request->status}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-primary">{{ __('job.form.button.search') }}</button>
                                            <a href="{{ route('admin.job.create') }}" class="btn btn-success">
                                                <i class="fa-solid fa-plus mr-2"></i>
                                                {{ __('job.form.button.create') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.alert')
                    </div>

                    <div class="table-responsive py-4" id="items-table">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" data-action="sortable" data-sort-name="title">{{ __('job.table.column.title') }}</th>
                                <th scope="col" data-action="sortable" data-sort-name="category_id">{{ __('job.table.column.job_category') }}</th>
                                <th scope="col" class="">{{ __('job.table.column.description') }}</th>
                                <th scope="col" class="">{{ __('job.table.column.salary_type') }}</th>
                                <th scope="col" class="">{{ __('job.table.column.number_member_join') }}</th>
                                <th scope="col" data-action="sortable" data-sort-name="status">{{ __('job.table.column.status') }}</th>
                                <th scope="col" class=""></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($models) > 0)
                                @foreach ($models as $model)
                                    @php
                                        $salaryType = json_decode($model->salary ?? '{}')->type ?? null;
                                        $jobCategoryWithId = collect($jobCategoryOptions)->where('id',$model->category_id)->first() ?? [];
                                        $jobCategoryName = \Arr::get($jobCategoryWithId,'name') ;
                                    @endphp
                                    <tr id="record-{{ $model->id }}">
                                        <td>{{ $model->title }}</td>
                                        <td>{{$jobCategoryName}}</td>
                                        <td>{{ $model->description }}</td>
                                        <td>{{$service->getNameOption($service->getSalaryTypeOptions(),$salaryType)}}</td>
                                        <td>{{ $model->total_join ?? 0 }}</td>
                                        <td>{{$service->getNameOption($service->getStatusOptions(),$model->status ?? null)}}</td>
                                        <td>
{{--                                            <img data-action="btn-popular" class="pointer" data-url="{{route('admin.job.popular',[$model->id])}}" src="/admin/img/icons/common/start-{{$model->is_popular?'active':'unactive'}}.svg">--}}
                                            <a class="mx-1" href="{{ route('admin.job.edit', [$model->id]) }}">
                                                <img src="{{ asset('admin/img/icons/common/pencil.svg') }}"/>
                                            </a>
                                            <a data-action="confirm-delete"
                                                data-url="{{route('admin.job.delete',[$model->id])}}"
                                                data-id="{{$model->id}}"
                                                data-title="{{__('job.modal.delete.title')}}"
                                                data-content="{{__('job.modal.delete.content')}}"
                                            >
                                                <img src="{{ asset('admin/img/icons/common/trash.svg') }}"/>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $models->withQueryString()->links('vendor.pagination.default') }}

                </div>
            </div>
        </div>
    </div>
@endsection
