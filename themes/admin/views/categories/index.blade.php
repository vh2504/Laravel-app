@extends('layouts.app', [
'title' => __('Category Management'),
'parentSection' => 'category',
'elementName' => 'category'
])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('category.list') }}</h3>
                        </div>
                        <div class="d-flex">
                            <form class="block-create-list form-search d-flex" action="{{route('admin.categories.index')}}">
                                <div class="d-flex w-100">
                                    <div class="col-12 p-0 pr-2">
                                        <div class="input-group input-group-alternative input-group-merge">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            <input type="text" class="form-control" name="name" value="{{$_GET['name']??''}}" placeholder="{{__('category.placeholders.search-title')}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">{{__('category.buttons.search')}}</button>
                            </form>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-plus mr-2"></i>{{ __('category.buttons.create-new') }}
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
                                <th scope="col" class="col-6">{{ __('category.columns.title') }}</th>
                                <th scope="col" class="col-6">{{ __('category.columns.description') }}</th>
                                <th scope="col" class="col-6">{{ __('category.columns.created_at') }}</th>
                                <th scope="col" class="col-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr id="record-{{ $category->id }}">
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>@show_date($category->created_at)</td>
                                <td>
                                    <a class="mx-1" href="{{ route('admin.categories.edit', [$category->id]) }}">
                                        <img src="{{ asset('admin/img/icons/common/pencil.svg') }}">
                                    </a>
                                    <a data-action="confirm-delete" data-url="{{route('admin.categories.destroy',[$category->id])}}" data-id="{{$category->id}}" data-title="{{__('category.messages.confirm-delete.title')}}" data-content="{{__('category.messages.confirm-delete.description')}}">
                                        <img class="pointer" src="{{ asset('admin/img/icons/common/trash.svg') }}">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->withQueryString()->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>

</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
