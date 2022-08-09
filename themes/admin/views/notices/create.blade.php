@extends('layouts.app', [
'title' => __('Notice Management'),
'parentSection' => 'CreateNoticeRequest',
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
                            <h3 class="mb-0">{{ __('notice.create') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.notices.store')}}" method="POST" id="form-notice" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="status">{{__('notice.columns.status')}}</label>
                                    <select class="form-control" name="status" id="status" data-toggle="select">
                                        <option value=""></option>
                                        <option @if(old('status')==1) selected @endif value="1">{{__('notice.status.published')}}</option>
                                        <option @if(old('status')==2) selected @endif value="2">{{__('notice.status.pending')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="published_at">{{__('notice.columns.published_at')}}</label>
                                    <input readonly="" class="form-control{{ $errors->has('published_at') ? ' is-invalid' : '' }}" name="published_at" id="published_at" type="datetime-local" value="{{old('published_at')}}" id="example-datetime-local-input">
                                </div>
                                @include('alerts.feedback', ['field' => 'published_at'])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="title">{{__('notice.columns.title')}}</label>
                                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" type="text" value="{{old('title')}}">
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="content">{{__('notice.columns.content')}}</label>
                                    <textarea style="min-height:350px" required="" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="5" id="content">
                                    {{old('content')}}
                                    </textarea>
                                    @include('alerts.feedback', ['field' => 'content'])
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between m-auto" style="width:320px">
                            <a href="{{route('admin.notices.index')}}">
                                <button type="button" style="border-radius:20px; width:150px" class=" btn btn-outline-danger">{{__('notice.buttons.cancel')}}</button>
                            </a>
                            <button type="submit" style="border-radius:20px; width:150px" class=" btn btn-primary">{{__('notice.buttons.submit')}}</button>
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
<script src="{{asset('admin/ckeditor/build/ckeditor.js')}}"></script>

<script>
    function SimpleUploadAdapterPlugin(editor, url, token) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader, url, token);
        };
    }
    ClassicEditor
        .create(document.querySelector('#content'), {
            extraPlugins: [function(editor) {
                return SimpleUploadAdapterPlugin(editor, "{{route('admin.images.upload-image-ckeditor')}}", "{{csrf_token()}}")
            }],
        })
        .then(editor => {
            editor.editing.view.change((writer) => {
                writer.setStyle(
                    "height",
                    "400px",
                    editor.editing.view.document.getRoot()
                );
            });
            window.editor = editor;

        })
        .catch(error => {
            console.log(error);
        });

    function statusPublishedAt() {
        const elementStatus = $('#status').find("option:selected");
        const valueStatus = elementStatus.val();
        if (valueStatus == 1) {
            $("#published_at").attr("readonly", true)
            const date = new Date();
            const year = date.getFullYear();
            const month = ("0" + (date.getMonth() + 1)).slice(-2);
            const day = ("0" + date.getDate()).slice(-2);
            const hour = ("0" + date.getHours()).slice(-2);
            const minute = ("0" + date.getMinutes()).slice(-2);
            const minuteMin = ("0" + (date.getMinutes() - 2)).slice(-2);
            const dateTime = `${year}-${month}-${day} ${hour}:${minute}`;
            const dateTimeMin = `${year}-${month}-${day} ${hour}:${minuteMin}`;
            $("#published_at").val(dateTime);
            $("#published_at").attr("min", dateTimeMin);
        } else {
            $("#published_at").attr("readonly", false)
        }
    }
    statusPublishedAt();
    $("#status").change(function() {
        statusPublishedAt();
    })
</script>
@endpush
