@extends('layouts.app', [
    'title' => __('Occupation Management'),
    'parentSection' => 'occupation',
    'elementName' => 'occupation'
])

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">{{ __('admin.label.list') }}</h3>
                            </div>
                            <div class="col-8 container-form-search">
                                <form class="block-create-list form-search d-flex" action="{{route('admin.admin.management.index')}}">
                                    <div class="d-flex w-100">
                                        <div class="p-0 pr-2">
                                            <div class="input-group input-group-alternative input-group-merge">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                <input type="text" class="form-control" name="email" value="{{$_GET['email']??''}}" placeholder="{{__('admin.placeholders.search')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('admin.btn.search') }}</button>
                                </form>
                                <a href="{{ route('admin.admin.management.create') }}" class="btn btn-success">
                                    <i class="fa-solid fa-plus mr-2"></i>{{ __('admin.btn.create') }}
                                </a>
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
                                    <th scope="col" class="col-3 ">
                                        <div class="row items-table__header">
                                            <div class="items-table__header">
                                                {{ __('admin.label.name') }}
                                            </div>

                                            <div class="">
                                                <div class="col-12">
                                                    <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'name', 'orderType' => 'asc']) }}">
                                                        <img src="{{asset('admin/img/icons/icon-up.svg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'name', 'orderType' => 'desc']) }}">
                                                        <img src="{{asset('admin/img/icons/icon-down.svg')}}" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="col-3 ">
                                        <div class="row items-table__header">
                                            <div class="items-table__header">
                                                {{ __('admin.label.email') }}
                                            </div>

                                            <div class="">
                                                <div class="col-12">
                                                    <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'email', 'orderType' => 'asc']) }}">
                                                        <img src="{{asset('admin/img/icons/icon-up.svg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'email', 'orderType' => 'desc']) }}">
                                                        <img src="{{asset('admin/img/icons/icon-down.svg')}}" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="col-3 ">
                                        <div class="row items-table__header">
                                            <div class="items-table__header">
                                                {{ __('admin.label.created_at') }}
                                            </div>

                                            <div class="">
                                                <div class="col-12">
                                                    <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'created_at', 'orderType' => 'asc']) }}">
                                                        <img src="{{asset('admin/img/icons/icon-up.svg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'created_at', 'orderType' => 'desc']) }}">
                                                        <img src="{{asset('admin/img/icons/icon-down.svg')}}" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    
                                    <th scope="col" class="col-3">{{ __('admin.label.status') }}</th>
                                    <th scope="col" class="col-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr id="record-{{ $admin->id }}">
                                        <td>
                                            <a href="{{ route('admin.admin.management.edit', $admin->id) }}">
                                                {{ $admin->name }}
                                            </a>
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            @show_date($admin->created_at)
                                        </td>
                                        <td>
                                            @if($admin->status == \App\Enums\Admin\EStatusAdmin::Active->value)
                                                Active
                                            @else
                                                InActive
                                            @endif
                                        </td>
                                        <td>
                                            <a class="mx-1" href="{{ route('admin.admin.management.edit', $admin->id) }}">
                                                <img src="{{ asset('admin/img/icons/common/pencil.svg') }}">
                                            </a>
                                            @if($admin->isAdmin())
                                            <!-- <a data-action="confirm-delete"
                                                data-url="{{route('admin.admin.management.destroy', $admin->id)}}"
                                                data-id="{{$admin->id}}"
                                                data-title="{{__('admin.modal.delete.title')}}"
                                                data-content="{{__('admin.modal.delete.content')}}"
                                            >
                                                <img src="/admin/img/icons/common/trash.svg">
                                            </a> -->
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{ $admins->withQueryString()->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

