@extends('layouts.app', [
    'title' => __('Occupation Management'),
    'parentSection' => 'laravel',
    'elementName' => 'occupation-management'
])

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('admin.label.add-title') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ isset($admin) ? route('admin.admin.management.update', $admin->id) : route('admin.admin.management.store') }}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('admin.label.name') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', isset($admin->name) ? $admin->name : '') }}">

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('admin.label.email') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', isset($admin->email) ? $admin->email : '') }}" @if(isset($admin)) disabled @endif>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>

                                        @if(isset($admin->email))
                                            <div class="form-group">
                                                <label class="form-control-label">{{__('admin.label.status')}}</label>
                                                <select class="col-12 form-control" data-placeholder="Chọn group" name="status">
                                                    <option value="{{ \App\Enums\Admin\EStatusAdmin::Active->value }}" @if(old('status', $admin->status) == \App\Enums\Admin\EStatusAdmin::Active->value) selected @endif>{{ __('admin.label.active') }}</option>
                                                    <option value="{{ \App\Enums\Admin\EStatusAdmin::InActive->value }}" @if(old('status', $admin->status) == \App\Enums\Admin\EStatusAdmin::InActive->value) selected @endif>{{ __('admin.label.inactive') }}</option>
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="col-6">
                                        @if(isset($admin) && auth()->user()->type->value == \App\Enums\User\ETypeAdmin::Admin->value)
                                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('admin.label.old_password') }} <span class="text-danger">*</span></label>
                                            <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" value="{{ old('old_password') }}">
                                            <input type="hidden" name="admin_id" value="{{ isset($id) ? $id : '' }}">

                                            @include('alerts.feedback', ['field' => 'old_password'])
                                        </div>
                                        @endif

                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('admin.label.password') }} <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">

                                            @include('alerts.feedback', ['field' => 'password'])
                                        </div>

                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('admin.label.password_confirmation') }} <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" value="{{ old('password_confirmation') }}">

                                            @include('alerts.feedback', ['field' => 'password_confirmation'])
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('admin.btn.cancel') }}</button>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('admin.btn.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection