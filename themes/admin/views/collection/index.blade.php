@extends('layouts.app', [
    'title' => __('Job collection management'),
    'parentSection' => 'collection',
    'elementName' => 'collection'
])

@section('title', __('collection.list',['name'=>__('collection.field.name')]))

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="mb-0">{{ __('collection.list',['name'=>__('collection.field.name')]) }}</h3>
                            </div>
                            <div class="d-flex">
                                <form method="get" class="block-create-list form-search"
                                    action="{{route('admin.collection.index')}}">
                                    <div class="d-flex w-100">
                                        <div class="col-4 p-0">
                                            <div class="input-group input-group-alternative input-group-merge">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                <input type="text" class="form-control" name="name" maxlength="255"
                                                    value="{{ old('name') }}"
                                                    placeholder="{{ __('collection.field.name') }}">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <button class="btn btn-primary">{{ __('collection.form.input.search') }}</button>
                                            <a href="{{ route('admin.collection.create') }}" class="btn btn-success">
                                                <i class="fa-solid fa-plus mr-2"></i>
                                                {{ __('collection.form.input.create') }}
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
                                <th scope="col" class="col-3">{{ __('collection.field.name') }}</th>
                                <th scope="col" class="col-6">{{ __('collection.field.job_category.label') }}</th>
                                <th scope="col" class="col-1">{{ __('collection.field.created_at') }}</th>
                                <th scope="col" class="col-1">{{ __('collection.field.updated_at') }}</th>
                                <th scope="col" class="col-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($collections) > 0)
                                @foreach ($collections as $model)
                                    <tr id="record-{{ $model->id }}">
                                        <td>{{ $model->name }}</td>
                                        <td>
                                            {!! \Illuminate\Support\Arr::get($groups,$model->id,'') !!}
                                        </td>
                                        <td>@show_date($model->created_at)</td>
                                        <td>@show_date($model->updated_at)</td>
                                        <td>
                                            <a class="mx-1"
                                                href="{{ route('admin.collection.edit', [$model->id]) }}">
                                                <img src="{{ asset('admin/img/icons/common/pencil.svg') }}"/>
                                            </a>
                                            <a data-action="confirm-delete"
                                                data-url="{{route('admin.collection.delete',[$model->id])}}"
                                                data-id="{{$model->id}}"
                                                data-title="{{__('collection.modal.delete.title')}}"
                                                data-content="{{__('collection.modal.delete.content')}}"
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
                    {{ $collections->withQueryString()->links('vendor.pagination.default') }}

                </div>
            </div>
        </div>
    </div>
@endsection
