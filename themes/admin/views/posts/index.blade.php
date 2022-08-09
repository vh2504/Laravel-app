@extends('layouts.app', [
'title' => __('Post Management'),
'parentSection' => 'post',
'elementName' => 'post'
])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('post.list') }}</h3>
                        </div>
                        <div class="d-flex">
                            <form class="block-create-list form-search d-flex" action="{{route('admin.posts.index')}}">
                                <div class="d-flex w-100">
                                    <div class="col-6 p-0 pr-2">
                                        <div class="input-group input-group-alternative input-group-merge">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            <input type="text" class="form-control" name="title" value="{{$_GET['title']??''}}" placeholder="{{__('post.placeholders.search-title')}}">
                                        </div>
                                    </div>
                                    <div class="col-3 p-0 pr-2">
                                        <select class=" form-control" name="status" aria-placeholder="{{__('post.placeholders.status')}}">
                                            <option value="">{{__('post.placeholders.status')}}</option>
                                            @foreach($listStatus as $status)
                                            <option @if(($_GET["status"]??'')==$status->value) selected @endif
                                                value="{{$status->value}}">{{__('post.status.'.$status->name)}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 p-0 pr-2">
                                        <select class=" form-control" name="category">
                                            <option value="">{{__('post.placeholders.category')}}</option>
                                            @foreach($categories as $category)
                                            <option @if(($_GET["category"]??'')==$category->id) selected @endif
                                                value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">{{__('post.buttons.search')}}</button>
                            </form>
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-plus mr-2"></i>{{ __('post.buttons.create-new') }}
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
                                <th scope="col" class="col-6">{{ __('post.columns.title') }}</th>
                                <th scope="col" class="col-6">{{ __('post.columns.category') }}</th>
                                <th scope="col" class="col-6">{{ __('post.columns.creator') }}</th>
                                <th scope="col" class="col-6">{{ __('post.columns.hashtag') }}</th>
                                <th scope="col" class="col-6">{{ __('post.columns.status') }}</th>
                                <th scope="col" class="col-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr id="record-{{ $post->id }}">
                                <td>
                                    <div>
                                        <div>
                                            <img width="100" src="{{$post->image}}" data-url="{{$post->image}}" class="imageModal" />
                                        </div>
                                        <a href="{{route('admin.posts.show',$post->id)}}">{{ $post->title }}</a>
                                    </div>
                                </td>
                                <td>@foreach($post->categories as $cate)
                                    <span class="badge badge-primary">{{ $cate->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{$post->creator->name}}</td>
                                <td>
                                    <div>
                                        @foreach($post->jobCategories as $job_cate)
                                        <span class="badge badge-primary">{{ $job_cate->name }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>{!!$post->status_view!!}</td>
                                <td>
                                    <img data-action="btn-popular" class="pointer" data-url="{{route('admin.posts.popular',[$post->id])}}" src="/admin/img/icons/common/start-{{$post->is_popular?'active':'unactive'}}.svg">
                                    <a class="mx-1" href="{{ route('admin.posts.edit', [$post->id]) }}">
                                        <img class="pointer" src="{{ asset('/admin/img/icons/common/pencil.svg') }}"/>
                                    </a>
                                    <a data-action="confirm-delete" data-url="{{route('admin.posts.destroy',[$post->id])}}" data-id="{{$post->id}}" data-title="{{__('post.messages.confirm-delete.title')}}" data-content="{{__('post.messages.confirm-delete.description')}}">
                                        <img class="pointer" src="{{ asset('admin/img/icons/common/trash.svg') }}"/>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $posts->withQueryString()->links('vendor.pagination.default') }}
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
