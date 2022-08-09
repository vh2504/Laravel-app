@extends('layouts.master', ['class' => 'bg-login'])

@section('title')
{{ __('login-frontend.page-title') }}
@endsection

@section('content')
<div class="container container-login">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card login-card bg-white shadow px-4">
                <div class="card-header login-card-header bg-transparent ptpx-30 pb-20 border-bottom-0">
                    <h3 class="card-header-title text-center mb-0">{{ __('login-frontend.title') }}</h3>
                </div>
                <div class="card-body login-card-body">
                    <form role="form" method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label class="lbl fs-14 lh-24" for="email">{{ __('login-frontend.fields.email') }}</label>
                            <input type="email"
                                class="form-control fs-14 lh-24 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                id="email" name="email" placeholder="sample@email.co.jp" value="{{ old('email', '') }}">
                            @if ($errors->has('email'))
                                <span id="email" class="form-text invalid-feedback" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }} mb-4">
                            <label class="lbl fs-14 lh-24" for="password">{{ __('login-frontend.fields.password') }}</label>
                            <input
                                type="password"
                                class="form-control fs-14 lh-24 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                id="password" name="password">
                            @if ($errors->has('password'))
                                <span id="password" class="form-text invalid-feedback" role="alert">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        @include('alert.error')
                        <div class="text-center" id="login">
                            <button type="submit" class="btn btn-login mb-3 fs-14 lh-24">{{ __('login-frontend.buttons.submit') }}</button>
                        </div>
                    </form>
                    <div class="col-12 text-center">
                        <a href="{{ route('reset-password') }}" class="text-danger card-body-forgot fs-14 lh-24">{{ __('login-frontend.buttons.forgot') }}</a>
                    </div>
                </div>
                <div class="card-footer login-card-footer bg-transparent border-top-0 py-20">
                    <h4 class="card-footer-title mb-1">{{ __('login-frontend.registers.unaccount') }}</h4>
                    <p class="card-footer-summary fs-14 lh-24 mb-4">{{ __('login-frontend.registers.question') }}</p>
                    <div class="text-center pb-20">
                        <a href="{{ route('get-register') }}" class="card-footer-register text-center fs-14 d-inline-block">{{ __('login-frontend.buttons.register') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
