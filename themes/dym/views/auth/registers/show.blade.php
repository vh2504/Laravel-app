@extends('layouts.master')

@section('title')
{{ __('register-frontend.page-title') }}
@endsection

@section('content')
    @include('layouts.main.heading')

    <div class="bg-main pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- Progress --}}
                    <div class="row text-center mb-4 pb-3">
                        <div class="col-12 col-md-3"></div>
                        <div class="col-12 col-md-7 pl-5">
                            <div class="progress-container">
                                <div class="progress" id="progress"></div>
                                <div class="circle active-progress">
                                    1
                                    <span class="mb-0">{{ __('register-frontend.progress.step1') }}</span>
                                </div>
                                <div class="circle text-center">
                                    2
                                    <span class="mb-0">{{ __('register-frontend.progress.step2') }}</span>
                                </div>
                                <div class="circle text-center">
                                    3
                                    <span class="mb-0">{{ __('register-frontend.progress.step3') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Show form --}}
                    <div class="card bg-transparent border-0">
                        <div class="card-body reset-card-body p-0">
                            <form role="form-tab01" method="POST" action="#" class="login-form register-form">
                                <div class="register-tab d-none">
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="email">
                                                {{ __('register-frontend.fields.tab1.email.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <p class="mb-0 fs-14 lh-24">{{ __('register-frontend.fields.tab1.email.title') }}</p>
                                            <input
                                                type="email"
                                                class="form-control fs-14 lh-24"
                                                id="email"
                                                name="email"
                                                placeholder="{{ __('register-frontend.fields.tab1.email.placeholder') }}">
                                            <span class="email form-text d-none" role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="password">
                                                {{ __('register-frontend.fields.tab1.password.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <p class="mb-0 fs-14 lh-24">{{ __('register-frontend.fields.tab1.password.title') }}</p>
                                            <input
                                                type="password"
                                                class="form-control fs-14 lh-24"
                                                id="password"
                                                name="password"
                                                placeholder="{{ __('register-frontend.fields.tab1.password.placeholder') }}  ">
                                                <span class="password form-text d-none" role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="password_confirmation">
                                                {{ __('register-frontend.fields.tab1.password_confirmation.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input
                                                type="password"
                                                class="form-control fs-14 lh-24"
                                                id="password_confirmation"
                                                name="password_confirmation"
                                                placeholder="{{ __('register-frontend.fields.tab1.password_confirmation.placeholder') }}">
                                                <span class="password_confirmation form-text d-none" role="alert"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" id="get-link-step1" value="{{ route('register-step', ['step' => 'Step1']) }}">
                                </div>
                                <div class="register-tab">
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="fullname">
                                                {{ __('register-frontend.fields.tab2.fullname.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="row">
                                                <div class="col-4">
                                                    <input
                                                        type="text"
                                                        class="form-control fs-14 lh-24"
                                                        id="first_name" name="first_name"
                                                        placeholder="{{ __('register-frontend.fields.tab2.fullname.fn-plh') }}">
                                                        <span class="first_name form-text d-none" role="alert"></span>
                                                </div>
                                                <div class="col-4">
                                                    <input
                                                        type="text"
                                                        class="form-control fs-14 lh-24"
                                                        id="last_name" name="last_name"
                                                        placeholder="{{ __('register-frontend.fields.tab2.fullname.ln-plh') }}">
                                                        <span class="last_name form-text d-none" role="alert"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="fullname_hira">
                                                {{ __('register-frontend.fields.tab2.fullname_hira.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="row">
                                                <div class="col-4">
                                                    <input
                                                        type="text"
                                                        class="form-control fs-14 lh-24"
                                                        id="first_name_hira" name="first_name_hira"
                                                        placeholder="{{ __('register-frontend.fields.tab2.fullname_hira.fn-plh') }}">
                                                        <span class="first_name_hira form-text d-none" role="alert"></span>
                                                </div>
                                                <div class="col-4">
                                                    <input
                                                        type="text"
                                                        class="form-control fs-14 lh-24"
                                                        id="last_name_hira" name="last_name_hira"
                                                        placeholder="{{ __('register-frontend.fields.tab2.fullname_hira.ln-plh') }}">
                                                        <span class="last_name_hira form-text d-none" role="alert"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="birthday">
                                                {{ __('register-frontend.fields.tab2.birthday.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="form-control fs-14 lh-24" name="birthday_year" id="birthday_year">
                                                        <option value="">{{ __('register-frontend.fields.tab2.birthday.year') }}</option>
                                                        @for ($i = date('Y') + 100; $i >= date('Y') - 100; $i--)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    <span class="birthday_year birthday_month birthday_day form-text" role="alert"></span>
                                                </div>
                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <select class="form-control fs-14 lh-24" name="birthday_month" id="birthday_month">
                                                                <option value="">{{ __('register-frontend.fields.tab2.birthday.month') }}</option>
                                                                @for ($i = 1; $i <= 12; $i++)
                                                                    <option value="{{ $i }}">{{ $i < 10 ? '0' .$i : $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <select class="form-control fs-14 lh-24" name="birthday_day" id="birthday_day">
                                                                <option value="">{{ __('register-frontend.fields.tab2.birthday.day') }}</option>
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    <option value="{{ $i }}">{{ $i < 10 ? '0' .$i : $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="gender">
                                                {{ __('register-frontend.fields.tab2.gender.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="row">
                                                <div class="col-4 d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="{{ App\Enums\User\ESex::Female->value }}" checked>
                                                        <label class="form-check-label" for="female">{{ __('register-frontend.fields.tab2.gender.female') }}</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="{{ App\Enums\User\ESex::Male->value }}">
                                                        <label class="form-check-label" for="male">{{ __('register-frontend.fields.tab2.gender.male') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="gender form-text d-none" role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="zipcode">
                                                {{ __('register-frontend.fields.tab2.zipcode.label') }}
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="row">
                                                <div class="col-4">
                                                    <input
                                                        type="text"
                                                        class="form-control fs-14 lh-24"
                                                        id="zipcode" name="zipcode"
                                                        placeholder="{{ __('register-frontend.fields.tab2.zipcode.placeholder') }}">
                                                        <span class="zipcode form-text d-none" role="alert"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-start">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="address">
                                                {{ __('register-frontend.fields.tab2.address.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="row mb-3">
                                                <div class="col-4">
                                                    <input type="hidden" name="getUrlPrefecture" id="getUrlPrefecture" value="{{ route('register-get-prefecture') }}">
                                                    <input type="hidden" name="getOptionEmtpy" id="getOptionEmpty" value="{{ __('register-frontend.fields.tab2.address.prefecture') }}">
                                                    <select class="form-control fs-14 lh-24" name="prefecture" id="prefecture"></select>
                                                    <span class="prefecture form-text d-none" role="alert"></span>
                                                </div>
                                                <div class="col-4">
                                                    <input type="hidden" name="getUrlCity" id="getUrlCity" value="{{ route('register-get-city') }}">
                                                    <input type="hidden" name="getOptionCityEmtpy" id="getOptionCityEmtpy" value="{{ __('register-frontend.fields.tab2.address.city') }}">
                                                    <select class="form-control fs-14 lh-24" name="city" id="city">
                                                        <option value="">{{ __('register-frontend.fields.tab2.address.city') }}</option>
                                                    </select>
                                                    <span class="city form-text d-none" role="alert"></span>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <input
                                                        type="text"
                                                        class="form-control fs-14 lh-24"
                                                        id="address" name="address"
                                                        placeholder="{{ __('register-frontend.fields.tab2.address.address-plh') }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input
                                                        type="text"
                                                        class="form-control fs-14 lh-24"
                                                        id="town" name="town"
                                                        placeholder="{{ __('register-frontend.fields.tab2.address.town-plh') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="number_phone">
                                                {{ __('register-frontend.fields.tab2.phone.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="row">
                                                <div class="col-4">
                                                    <input
                                                        type="text"
                                                        class="form-control fs-14 lh-24"
                                                        id="number_phone" name="number_phone"
                                                        placeholder="{{ __('register-frontend.fields.tab2.phone.placeholder') }}">
                                                        <span class="number_phone form-text d-none" role="alert"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6 align-items-center">
                                        <div class="col-12 col-md-3">
                                            <label class="lbl" for="job_situation">
                                                {{ __('register-frontend.fields.tab2.job_situation.label') }}
                                                <span class="label-required ml-2">{{ __('register-frontend.fields.required') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="row">
                                                <div class="col-6 d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="job_situation" id="working" value="{{ App\Enums\User\EJobSituation::Working->value }}" checked>
                                                        <label class="form-check-label" for="working">{{ __('register-frontend.fields.tab2.job_situation.work') }}</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="job_situation" id="unemployed" value="{{ App\Enums\User\EJobSituation::Unemployed->value }}">
                                                        <label class="form-check-label" for="unemployed">{{ __('register-frontend.fields.tab2.job_situation.unemployed') }}</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="job_situation" id="studying" value="{{ App\Enums\User\EJobSituation::Studying->value }}">
                                                        <label class="form-check-label" for="studying">{{ __('register-frontend.fields.tab2.job_situation.study') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="job_situation form-text d-none" role="alert"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" id="get-link-step2" value="{{ route('register-step', ['step' => 'Step2']) }}">
                                </div>
                                <div class="register-tab d-none">
                                    {{ __('register-frontend.progress.step3') }}
                                </div>
                                <div class="text-center col-12 ml-auto" id="login">
                                    <button id="btn-prev-js" data-action="Step1" type="button" class="btn btn-primary-action mt-3 mb-3 fs-14 d-none">{{ __('register-frontend.buttons.prev') }}</button>
                                    <button id="btn-next-js" data-action="Step2" type="button" class="btn btn-secondary-action mt-3 mb-3 fs-14">{{ __('register-frontend.buttons.next') }}</button>
                                    <button id="btn-submit-js" type="submit" class="btn btn-primary-submit mt-3 mb-3 fs-14 lh-24 d-none">{{ __('register-frontend.buttons.submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.main.support')
    </div>
@endsection

@push('js')
@endpush
