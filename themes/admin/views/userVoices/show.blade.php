@extends('layouts.app', [
'title' => __('User Voice Management'),
'parentSection' => 'userVoice',
'elementName' => 'userVoice'
])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('userVoice.show') }}</h3>
                        </div>
                        <div class="d-flex">
                            <a href="{{route('admin.userVoices.index')}}" class="btn btn-danger mr-2">
                                {{ __('userVoice.buttons.back') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-2"><b>{{ __('userVoice.columns.fullname') }}:</b></div>
                        <div class="col-10">{{ $userVoice->user->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"><b>{{ __('userVoice.columns.age') }}:</b></div>
                        <div class="col-10">{{ App\Helpers\Common::getAge($userVoice->user->birthday) . __('代')}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"><b>{{ __('userVoice.columns.email') }}:</b></div>
                        <div class="col-10">{{ $userVoice->user->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"><b>{{ __('userVoice.columns.job_category') }}:</b></div>
                        <div class="col-10">
                            @foreach ($userVoice->job->jobCategories as $jobCategory)
                                {{ $jobCategory->name }},
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"><b>{{ __('userVoice.columns.rate') }}:</b></div>
                        <div class="col-10">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($userVoice->rate < $i)
                                    <img src="{{asset('admin/img/icons/common/start-unactive.svg')}}" />
                                @else
                                    <img src="{{asset('admin/img/icons/common/start-active.svg')}}" />
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"><b>{{ __('userVoice.columns.created_at') }}:</b></div>
                        <div class="col-10">{{ $userVoice->created_at->format('m/d/Y') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12"><b>{{ __('userVoice.columns.note') }}</b></div>
                        <div class="col-10 ml-auto">
                            @php($notes = json_decode($userVoice->note))
                            @empty (!$notes)
                            <ul class="list-unstyled">
                                @foreach ($notes as $note)
                                    <li class="mb-2">「{{ $note }}」</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12"><b>{{ __('userVoice.columns.comment') }}:</b></div>
                        <div class="col-12">{{ $userVoice->comment }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
