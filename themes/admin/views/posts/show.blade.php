@extends('layouts.app', [
'title' => __('Post Management'),
'parentSection' => 'post',
'elementName' => 'post'
])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card post-detail pb-3" style="background:#f3efe4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('post.show') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    @include('alerts.alert')
                </div>
                <div class="p-4 mx-auto text-center" style="width:640px;">
                    <h3 class="text-center" >{{__('post.show-page.status')}} : {!!$post->status_view!!}</h3>
                    @if($post->status == \App\Enums\Post\EPostStatus::Rejected)
                    <strong>{{__('post.columns.reason')}}: {{$post->reason}} </strong>
                    @endif
                </div>
                <div class="card-body mx-auto" style="font-size:14px; width:640px; background:white">

                    <a href="#">
                        <h3> <span class="badge badge-primary">Category Category Category</span></h3>
                    </a>
                    <div>
                        {{__('post.show-page.creator')}}: <a href="#">{{$post->creator->name}}</a>
                    </div>
                    <div class="mt-2">
                        <span class="mr-3">{{__('post.show-page.published_at')}}: {{$post->published_at ? date('Y/m/d', strtotime($post->published_at)): ''}}</span>
                        <span>{{__('post.show-page.updated_at')}}: {{date('Y/m/d', strtotime($post->updated_at))}}</span>
                    </div>
                    <div class="my-4">
                        <h1 class="title">
                            {{$post->title}}
                        </h1>

                        <div class="hashtag">
                            @foreach($post->jobCategories as $job_cate)
                            <span class="badge badge-primary">{{ $job_cate->name }}</span>
                            @endforeach
                        </div>
                        <div class="summary my-4">
                            {{$post->summary}}
                        </div>
                        <img width="100%" src="{{$post->image}}" alt="post image">
                        <div class="content">
                            {!!$post->content!!}
                        </div>
                    </div>
                    <!-- <div style="background:#eaecfb; margin: 0 -1.5rem 0 -1.5rem;" class="py-2 pl-4">
                        <strong>プロフィール</strong>
                    </div>
                    <div class="mt-3">
                        <h3>{{__('post.show-page.creator')}}: <a href="#" style="color: #5e72e4;">{{$post->creator->name}}</a></h3>
                        <div class="d-flex">
                            <img src="https://huyhoanhotel.com/wp-content/uploads/2016/05/765-default-avatar.png" class="mr-3 rounded-circle" style="width:100px; height: fit-content;">
                            <div class="author-description">
                                「なるほど！ジョブメドレー」は、医療介護求人サイト「ジョブメドレー」が運営するメディアです。医療・介護・保育・福祉・美容・ヘルスケアの仕事に就いている人や就きたい人のために、キャリアを考えるうえで役立つ情報をお届けしています。仕事や転職にまつわるご自身の経験について話を聞かせていただける方も随時募集中。詳しくは「取材協力者募集」の記事をご覧ください！
                            </div>
                        </div>
                    </div> -->
                </div>
                @if($isSuperAdmin && $post->status == \App\Enums\Post\EPostStatus::Pending)
                <div class="d-flex justify-content-between mx-auto mt-5" style="width:320px">
                    <button type="button" data-toggle="modal" data-target="#confirmReject" style="border-radius:20px; width:150px" class=" btn btn-outline-danger">{{__('post.buttons.reject')}}</button>
                    <button type="button" data-toggle="modal" data-target="#confirmApprove" style="border-radius:20px; width:150px" class=" btn btn-success">{{__('post.buttons.approve')}}</button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmReject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title form-control-label mx-auto" for="published_at">{{__('post.columns.reason')}}</label>
                </div>
                <div class="px-4">
                <form action="{{route('admin.posts.confirm', $post->id)}}" method="POST" id="form-post" enctype='multipart/form-data'>
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <input name="status" type="hidden" value="{{\App\Enums\Post\EPostStatus::Rejected->value}}">
                        <div class="modal-body row pb-0 pt-0">
                            <div class="col-md-12">
                            <label class="form-control-label" for="reason">{{__('post.validations.reason.required')}}</label>
                                <textarea style="height:150px" resize="none" class="form-control{{ $errors->has('reason') ? ' is-invalid' : '' }}" id="reason" name="reason">{{old('reason')}}</textarea> 
                            </div>
                            @include('alerts.feedback', ['field' => 'reason'])
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" style="border-radius:20px; width:150px" class="btn btn-secondary" data-dismiss="modal">{{__('post.buttons.cancel')}}</button>
                            <button type="submit" style="border-radius:20px; width:150px" class="btn btn-success">{{__('post.buttons.submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title form-control-label" for="published_at">{{__('post.create-page.published_at')}}</label>
                </div>
                <div class="px-4">
                <form action="{{route('admin.posts.confirm', $post->id)}}" method="POST" id="form-post" enctype='multipart/form-data'>
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <input name="status" type="hidden" value="{{\App\Enums\Post\EPostStatus::Approved->value}}">
                        <div class="modal-body row pb-0">
                            <div class="col-md-4">
                                <div class="custom-control custom-radio mb-3">
                                    <input name="radio-publish" value="publish_now" class="custom-control-input" id="publish_now" checked="" type="radio">
                                    <label class="custom-control-label" for="publish_now">{{__('post.radios.publish_now')}}</label>
                                </div>
                                <div class="custom-control custom-radio mb-3">
                                    <input name="radio-publish" value="publish_custom" class="custom-control-input" id="publish_custom" type="radio">
                                    <label class="custom-control-label" for="publish_custom">{{__('post.radios.publish_custom')}}</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input class="form-control" readonly name="published_at" id="published_at" type="datetime-local" value="{{date('Y-m-d H:i:s')}}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" style="border-radius:20px; width:150px" class="btn btn-secondary" data-dismiss="modal">{{__('post.buttons.cancel')}}</button>
                            <button type="submit" style="border-radius:20px; width:150px" class="btn btn-success">{{__('post.buttons.submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $('input[name="radio-publish"]').change(function() {
        if ($(this).val() == 'publish_custom') {
            $('#published_at').attr('readonly', false)
        } else {
            const date = new Date();
            const year = date.getFullYear();
            const month = ("0" + (date.getMonth() + 1)).slice(-2);
            const day = ("0" + date.getDate()).slice(-2);
            const hour = ("0" + date.getHours()).slice(-2);
            const minute = ("0" + date.getMinutes()).slice(-2);
            const dateTime = `${year}-${month}-${day} ${hour}:${minute}`;
            $('#published_at').attr('readonly', true).val(dateTime)
        }
    })
</script>
@endpush
