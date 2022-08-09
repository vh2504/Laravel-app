@extends('layouts.master', ['class' => 'bg-reset pt-9'])
@section('title')
{{ __('reset-frontend.page-title.success') }}
@endsection

@section('content')
<div class="container container-login">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card login-card reset-card bg-white shadow px-4">
                <div class="card-header reset-card-header bg-transparent ptpx-30 pb-20 border-bottom-0">
                    <h3 class="card-header-title text-center mb-0">{{ __('reset-frontend.page-title.success') }}</h3>
                </div>
                <div class="card-body reset-card-body">
                    @if (session('success-reset'))
                        <p class="reset-card-description fs-14 lh-24 pb-4">{{session('success-reset')}}</p>
                    @endif
                    <div class="text-center pb-20">
                        <a href="{{ route('get-login') }}" class="btn btn-login mb-3 fs-14 lh-24 d-inline-block px-3">
                            {{ __('reset-frontend.buttons.top') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
