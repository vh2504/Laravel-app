@extends('layouts.app', [
'title' => __('Feature Management'),
'parentSection' => 'collection',
'elementName' => 'feature'
])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('feature.list') }}</h3>
                        </div>
                        <div class="d-flex">
                            <form class="block-create-list form-search d-flex" action="{{route('admin.features.index')}}">
                                <div class="d-flex w-100">
                                    <div class="col-6 p-0 pr-2">
                                        <div class="input-group input-group-alternative input-group-merge">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            <input type="text" class="form-control" name="name" value="{{$_GET['name']??''}}" placeholder="{{__('feature.placeholders.name')}}">
                                        </div>
                                    </div>
                                    <div class="col-3 p-0 pr-2">
                                        <select class=" form-control" name="type_group" aria-placeholder="{{__('feature.placeholders.type_group')}}">
                                            <option value="">{{__('feature.placeholders.type_group')}}</option>
                                            @foreach($listTypeGroup as $typeGroup)
                                            <option @if(($_GET["status"]??'')==$typeGroup->value) selected @endif
                                                value="{{$typeGroup->value}}">{{__('feature.type_group.'.strtolower($typeGroup->name))}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 p-0 pr-2">
                                        <select class=" form-control" name="job_category">
                                            <option value="">{{__('feature.placeholders.job_category')}}</option>
                                            @foreach($jobCategories as $jobCategory)
                                            <option @if(($_GET["job_category"]??'')==$jobCategory->id) selected @endif
                                                value="{{$jobCategory->id}}">{{$jobCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">{{__('feature.buttons.search')}}</button>
                            </form>
                            <a href="{{ route('admin.features.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-plus mr-2"></i>{{ __('feature.buttons.create-new') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    @include('alerts.alert')
                    @include('alerts.alert-response-ajax')
                </div>

                <div class="table-responsive py-4" id="items-table">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="col-6">{{ __('feature.columns.name') }}</th>
                                <th scope="col" class="col-6">{{ __('feature.columns.type_group') }}</th>
                                <th scope="col" class="col-6">{{ __('feature.columns.job_category') }}</th>
                                <th scope="col" class="col-6">{{ __('feature.columns.created_at') }}</th>
                                <th scope="col" class="col-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $feature)
                            <tr id="record-{{ $feature->id }}">
                                <td>
                                    {{ $feature->name }}
                                </td>
                                <td>{{__('feature.type_group.'.strtolower($feature->type_group->name))}}</td>
                                <td>
                                    @for($i = 0 ; $i < min(count($feature->jobCategories),5); $i++)
                                    <span class="badge badge-primary">{{ $feature->jobCategories[$i]->name }}</span>
                                    @endfor
                                    {{count($feature->jobCategories)> 5?'...':''}}
                                </td>
                                <td>@show_date($feature->created_at)</td>
                                <td>
                                    <img data-action="btn-popular" class="pointer" data-url="{{route('admin.features.popular',[$feature->id])}}" src="/admin/img/icons/common/start-{{$feature->is_popular?'active':'unactive'}}.svg">
                                    <a class="mx-1" href="{{ route('admin.features.edit', [$feature->id]) }}">
                                        <img src="{{ asset('/admin/img/icons/common/pencil.svg') }}">
                                    </a>
                                    <a data-action="confirm-delete" data-url="{{route('admin.features.destroy',[$feature->id])}}" data-id="{{$feature->id}}" data-title="{{__('feature.messages.confirm-delete.title')}}" data-content="{{__('feature.messages.confirm-delete.description')}}">
                                        <img class="pointer" src="{{ asset('admin/img/icons/common/trash.svg') }}"/>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $features->withQueryString()->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
    @include('alerts.modal-open-image')

</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
