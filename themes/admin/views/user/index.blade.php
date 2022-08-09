@extends('layouts.app', [
    'title' => __('Occupation Management'),
    'parentSection' => 'user',
    'elementName' => 'user'
])

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">{{ __('user.label.list') }} {{ $users->total() }} {{ __('user.label.list_end') }}</h3>
                            </div>
                            
                            <div class="col-8 container-form-search">
                                <form class="block-create-list form-search" action="" >
                                    <div class="row">
                                        <div class="p-0 pr-2">
                                            <select class=" form-control" name="status">
                                                <option value="">{{__('user.label.status')}}</option>
                                                <option value="{{\App\Enums\User\EStatusUser::Active->value}}"
                                                    @if($request->status==\App\Enums\User\EStatusUser::Active->value)
                                                    selected
                                                    @endif
                                                >
                                                    {{__('user.label.active') }}
                                                </option>
                                                <option value="{{\App\Enums\User\EStatusUser::InActive->value}}"
                                                    @if($request->status==\App\Enums\User\EStatusUser::InActive->value)
                                                    selected
                                                    @endif
                                                >
                                                    {{__('user.label.in_active') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="p-0 pr-2">
                                            <div class="input-group input-group-alternative input-group-merge">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                <input type="text" class="form-control" name="email" value="{{$_GET['email']??''}}" placeholder="{{__('user.placeholders.search')}}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">{{ __('user.btn.search') }}</button>
                                        <button type="submit" class="btn btn-primary mr-2" formaction="{{ route('admin.user.export') }}">{{ __('user.btn.export') }}</button>
                                    </div>
                                    
                                </form>
                                
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
                                    <th scope="col" class="col-2">
                                        <div class="row items-table__header pl-3 pr-3">
                                            <div class="items-table__header">
                                                {{ __('user.label.name') }}
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
                                    <th scope="col" class="col-2">
                                        <div class="row items-table__header pl-3 pr-3">
                                            <div class="items-table__header">
                                                {{ __('user.label.birthday') }}
                                            </div>

                                            <div class="">
                                                <div class="col-12">
                                                    <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'birthday', 'orderType' => 'asc']) }}">
                                                        <img src="{{asset('admin/img/icons/icon-up.svg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'birthday', 'orderType' => 'desc']) }}">
                                                        <img src="{{asset('admin/img/icons/icon-down.svg')}}" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="col-3">
                                        <div class="row items-table__header pl-3 pr-3">
                                            <div class="items-table__header">
                                                {{ __('user.label.email') }}
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
                                    <th scope="col" class="col-2">
                                        <div class="row items-table__header pl-3 pr-3">
                                            <div class="items-table__header">
                                                {{ __('user.label.created_at') }}
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
                                    <th scope="col" class="col-2">{{ __('user.label.status') }}</th>
                                    <th scope="col" class="col-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="record-{{ $user->id }}">
                                        <td>
                                            <a href="{{ route('admin.user.show', $user->id) }}">
                                                {{ $user->name }}
                                            </a>
                                        </td>
                                        <td>{{ now()->year - date('Y',strtotime($user->birthday))}}{{ __('user.label.year_old') }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                        @show_date($user->created_at)
                                        </td>
                                        <td>
                                            <div class="text-success user-active @if($user->status == \App\Enums\User\EStatusUser::InActive->value) display-none @endif">{{ __('user.label.active') }}</div>
                                            <div class="text-error user-in-active @if($user->status == \App\Enums\User\EStatusUser::Active->value) display-none @endif">{{ __('user.label.in_active') }}</div>
                                        </td>
                                        <td>
                                            <a class="confirm-update-active-inactive-user user-in-active @if($user->status == \App\Enums\User\EStatusUser::Active->value) display-none @endif"
                                                data-action="show-confirm-modal" data-url="{{route('admin.user.change-status', [$user->id, \App\Enums\User\EStatusUser::Active->value])}}"
                                                data-id="{{$user->id}}" data-callback="change-status" data-method="put" data-title=""
                                                data-button-no="{{__('common.No')}}" data-button-yes="{{__('common.Yes')}}"
                                                data-content="{{__('user.modal.change-status.title-unlock')}}">
                                                <i class="fa-solid fa-lock-open"></i>
                                            </a>

                                            <a class="confirm-update-active-inactive-user user-active @if($user->status == \App\Enums\User\EStatusUser::InActive->value) display-none @endif"
                                                data-action="show-confirm-modal" data-url="{{route('admin.user.change-status', [$user->id, \App\Enums\User\EStatusUser::InActive->value])}}"
                                                data-id="{{$user->id}}" data-callback="change-status" data-method="put" data-title=""
                                                data-button-no="{{__('common.No')}}" data-button-yes="{{__('common.Yes')}}"
                                                data-content="{{__('user.modal.change-status.title-lock')}}">
                                                <i class="fa-solid fa-lock"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->withQueryString()->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection