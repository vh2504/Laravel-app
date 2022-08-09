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
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('userVoice.list') }}</h3>
                        </div>
                        <div class="d-flex">
                            <form class="block-create-list form-search d-flex" action="{{route('admin.userVoices.index')}}">
                                <div class="d-flex w-100">
                                    <div class="col-12 p-0 pr-2">
                                        <div class="input-group input-group-alternative input-group-merge">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            <input type="text" class="form-control" name="comment" value="{{$_GET['comment']??''}}" placeholder="{{__('userVoice.placeholders.search-title')}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">{{__('userVoice.buttons.search')}}</button>
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
                                <th scope="col" class="col-6">{{ __('userVoice.columns.fullname') }}</th>
                                <th scope="col" class="col-6">{{ __('userVoice.columns.email') }}</th>
                                <th scope="col" class="col-6">{{ __('userVoice.columns.created_at') }}</th>
                                <th scope="col" class="col-6 text-center">{{ __('userVoice.columns.rate') }}</th>
                                <th scope="col" class="col-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userVoices as $userVoice)
                            <tr id="record-{{ $userVoice->id }}">
                                <td>
                                    <div>
                                        <a href="{{route('admin.userVoices.show', $userVoice->id)}}">
                                            {{ $userVoice->user->name }}
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $userVoice->user->email }}</td>
                                <td>@show_date($userVoice->created_at)</td>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($userVoice->rate < $i)
                                            <img src="{{asset('admin/img/icons/common/start-unactive.svg')}}" />
                                        @else
                                            <img src="{{asset('admin/img/icons/common/start-active.svg')}}" />
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                    <img class="pointer action-popular" data-url="{{route('admin.userVoices.popular',$userVoice->id)}}" data-id="{{$userVoice->id}}" data-is_popular="{{$userVoice->is_popular}}" src="/admin/img/icons/common/start-{{$userVoice->is_popular?'active':'unactive'}}.svg">
                                    <a data-action="confirm-delete" data-url="{{route('admin.userVoices.destroy',[$userVoice->id])}}" data-id="{{$userVoice->id}}" data-title="{{__('userVoice.messages.confirm-delete.title')}}" data-content="{{__('userVoice.messages.confirm-delete.description')}}">
                                        <img class="pointer" src="{{ asset('admin/img/icons/common/trash.svg') }}"/>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $userVoices->withQueryString()->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
    <form id="formUpdatePopular" action="" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="is_popular" value="">
    </form>
    @include('alerts.modal-open-image')

</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $('.action-popular').click(function() {
        let isPopular = parseInt($(this).data('is_popular'));
        $("#formUpdatePopular input[name='is_popular']").val(isPopular == 1 ? 0 : 1);
        $("#formUpdatePopular").attr('action', $(this).data('url'));
        $("#formUpdatePopular").submit();
    })
</script>
@endpush
