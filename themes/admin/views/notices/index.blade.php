@extends('layouts.app', [
'title' => __('Notice Management'),
'parentSection' => 'notice',
'elementName' => 'notice'
])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('notice.list') }}</h3>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.notices.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-plus mr-2"></i>{{ __('notice.buttons.create-new') }}
                            </a>
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
                                <th scope="col" class="col-6">{{ __('notice.columns.title') }}</th>
                                <th scope="col" class="col-6">{{ __('notice.columns.published_at') }}</th>
                                <th scope="col" class="col-6">{{ __('notice.columns.status') }}</th>
                                <th scope="col" class="col-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $notice)
                            <tr id="record-{{ $notice->id }}">
                                <td>
                                    {{ $notice->title }}
                                </td>
                                <td>
                                    {{$notice->published_at}}
                                </td>
                                <td>{!!$notice->status_view!!}</td>
                                <td>
                                    <a class="mx-1" href="{{ route('admin.notices.edit', [$notice->id]) }}">
                                        <img class="pointer" src="{{ asset('/admin/img/icons/common/pencil.svg') }}"/>
                                    </a>
                                    <a data-action="confirm-delete" data-url="{{route('admin.notices.destroy',[$notice->id])}}" data-id="{{$notice->id}}" data-title="{{__('notice.messages.confirm-delete.title')}}" data-content="{{__('notice.messages.confirm-delete.description')}}">
                                        <img class="pointer" src="{{ asset('admin/img/icons/common/trash.svg') }}"/>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $notices->withQueryString()->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
    @include('alerts.modal-open-image')

</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
