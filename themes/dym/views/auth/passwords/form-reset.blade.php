@extends('layouts.master', ['class' => 'bg-reset'])
@section('title')
{{ __('reset-frontend.page-title.form') }}
@endsection

@section('content')
<div class="container container-login">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card login-card reset-card bg-white shadow px-4">
                <div class="card-header reset-card-header bg-transparent ptpx-30 pb-20 border-bottom-0">
                    <h3 class="card-header-title text-center mb-0">{{ __('reset-frontend.page-title.form') }}</h3>
                </div>
                <div class="card-body reset-card-body">
                    <form role="form" method="POST" action="{{ route('confirm-reset-password', ['token' => $token]) }}" class="login-form">
                        @csrf
                        <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }} mb-4">
                            <label class="lbl fs-14 lh-24" for="password">{{ __('reset-frontend.fields.password') }}</label>
                            <div class="position-relative">
                                <span class="eye-js fa-eyes" data-active="unactive">
                                    <img src="{{ asset('/dym/img/icons/eye.svg') }}" alt="eye">
                                </span>
                                <input
                                    type="password"
                                    class="form-control fs-14 lh-24 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    id="password"
                                    name="password"
                                    placeholder="{{ __('reset-frontend.placeholder.password-min') }}" />
                            </div>
                            @if ($errors->has('password'))
                                <span id="password" class="form-text invalid-feedback" role="alert">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-danger' : '' }} mb-4">
                            <label class="lbl fs-14 lh-24" for="password_confirmation">{{ __('reset-frontend.fields.password-confirmation') }}</label>
                            <div class="position-relative">
                                <span class="eye-js fa-eyes" data-active="unactive">
                                    <img src="{{ asset('/dym/img/icons/eye.svg') }}" alt="eye">
                                </span>
                                <input
                                    type="password"
                                    class="form-control fs-14 lh-24 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="{{ __('reset-frontend.placeholder.password-min') }}" />
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span id="password" class="form-text invalid-feedback" role="alert">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                            @endif
                        </div>
                        @include('alert.error')
                        <div class="text-center pb-20" id="login">
                            <button type="submit" class="btn btn-login mt-3 mb-3 fs-14 lh-24 px-3">{{ __('reset-frontend.buttons.submit-form') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
