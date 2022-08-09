@extends('layouts.master', ['class' => 'bg-reset'])

@section('title')
{{ __('reset-frontend.page-title.reset') }}
@endsection

@section('content')
<div class="container container-login">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card login-card reset-card bg-white shadow px-4">
                <div class="card-header reset-card-header bg-transparent ptpx-30 pb-20 border-bottom-0">
                    <h3 class="card-header-title text-center mb-0">{{ __('reset-frontend.page-title.reset') }}</h3>
                </div>
                <div class="card-body reset-card-body">
                    <p class="reset-card-description fs-14 lh-24 pb-4">{{ __('reset-frontend.description') }}</p>
                    <form role="form" method="POST" action="{{ route('reset-password') }}" class="login-form">
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label class="lbl fs-14 lh-24" for="email">{{ __('reset-frontend.fields.email') }}</label>
                            <input
                                type="email"
                                class="form-control fs-14 lh-24 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                id="email" name="email" placeholder="{{ __('reset-frontend.placeholder.email') }}">
                            @if ($errors->has('email'))
                                <span id="email" class="form-text invalid-feedback" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                            @include('alert.error')
                        </div>
                        <div class="text-center" id="login">
                            <button type="submit" class="btn btn-reset mt-3 mb-3 fs-14 lh-24">{{ __('reset-frontend.buttons.submit-reset') }}</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer login-card-footer bg-transparent border-top-0 py-20">
                    <h4 class="card-footer-title mb-1">{{ __('reset-frontend.registers.unaccount') }}</h4>
                    <p class="card-footer-summary fs-14 lh-24 mb-4">{{ __('reset-frontend.registers.question') }}</p>
                    <div class="text-center pb-20">
                        <a href="{{ route('get-register') }}" class="card-footer-register text-center fs-14 d-inline-block">{{ __('reset-frontend.registers.link') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
