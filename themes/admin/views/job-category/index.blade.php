@extends('layouts.app', [
    'title' => __('Job collection management'),
    'parentSection' => 'job-categories',
    'elementName' => 'job-categories'
])
@section('title', __('job_category.list'))

@php
    $ids = $models->pluck('id')->toArray();
    $collectionGroups = $service->getGroupCollectionLabels($ids);
@endphp

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="mb-0">{{ __('job_category.list') }}</h3>
                            </div>
                            <div class="d-flex">
                                <form method="get" class="block-create-list form-search"
                                    action="{{route('admin.job-categories.index')}}">
                                    <div class="d-flex w-100">
                                        <div class="col-4">
                                            <div class="input-group input-group-alternative input-group-merge">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                <input type="text" class="form-control" name="name" maxlength="255"
                                                    value="{{ old('name') }}"
                                                    placeholder="{{ __('job_category.field.name.search') }}">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <select class=" form-control" name="collection_id" aria-placeholder="{{__('job_category.field.collection')}}">
                                                <option value="" selected disabled>{{__('job_category.field.collection')}}</option>
                                                @foreach($service->getCollectionOptions() as $collection)
                                                    <option @if(($request->collection_id ?? '') == $collection->id) selected @endif value="{{$collection->id}}">
                                                        {{$collection->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <button class="btn btn-primary">{{ __('job_category.form.button.search') }}</button>
                                            <a href="{{ route('admin.job-categories.create') }}" class="btn btn-success">
                                                <i class="fa-solid fa-plus mr-2"></i>
                                                {{ __('job_category.form.button.create') }}
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
                                <th scope="col" class="col-9">{{ __('job_category.field.name.label') }}</th>
                                <th scope="col" class="col-9">{{ __('job_category.field.collection') }}</th>
                                <th scope="col" class="col-1">{{ __('job_category.field.created_at') }}</th>
                                <th scope="col" class="col-1">{{ __('job_category.field.updated_at') }}</th>
                                <th scope="col" class="col-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($models) > 0)
                                @foreach ($models as $model)
                                    <tr id="record-{{ $model->id }}">
                                        <td>{{ $model->name }}</td>
                                        <td>
                                            {!! \Illuminate\Support\Arr::get($collectionGroups,$model->id,'') !!}
                                        </td>
                                        <td>@show_date($model->created_at)</td>
                                        <td>@show_date($model->updated_at)</td>
                                        <td>
                                            <img data-action="btn-popular" class="pointer" data-url="{{route('admin.job-categories.popular',[$model->id])}}" src="/admin/img/icons/common/start-{{$model->is_popular?'active':'unactive'}}.svg">
                                            <a class="mx-1" href="{{ route('admin.job-categories.edit', [$model->id]) }}">
                                                <img src="{{ asset('admin/img/icons/common/pencil.svg') }}"/>
                                            </a>
                                            <a data-action="confirm-delete"
                                                data-url="{{route('admin.job-categories.delete',[$model->id])}}"
                                                data-id="{{$model->id}}"
                                                data-title="{{__('job_category.modal.delete.title')}}"
                                                data-content="{{__('job_category.modal.delete.content')}}"
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
