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
                            <h3 class="mb-0">{{ __('post.create') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.posts.store')}}" method="POST" id="form-post" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">{{__('post.create-page.image')}}</label>
                            <div class="dropzone dropzone-single mb-3 @if(old('image')) dz-started dz-max-files-reached @endif" id="my-dropzone" style="width:500px">
                                <div class="fallback">
                                    <div class="custom-file">
                                        <label class="custom-file-label">{{__('post.create-page.chose-file')}}</label>
                                    </div>
                                </div>
                                <div class="dz-preview-single ">
                                    @if(old('image'))
                                    <div class="dz-preview-cover dz-processing dz-image-preview">
                                        <img class="dz-preview-img" src="https://www.w3schools.com/howto/img_forest.jpg">
                                    </div>
                                    @endif
                                </div>
                                <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                            </div>
                            @include('alerts.feedback', ['field' => 'image'])
                        </div>
                        <input type="hidden" name="image" value="{{old('image')}}" class="custom-file-input" id="image">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="title">{{__('post.create-page.title')}}</label>
                                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" type="text" value="{{old('title')}}">
                                </div>
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="category">{{__('post.create-page.category')}}</label>
                                    <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" id="category" data-toggle="select">
                                        <option value=""></option>
                                        @foreach($categories as $cate)
                                        <option @if(old('category_id')==$cate->id) selected @endif value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @include('alerts.feedback', ['field' => 'category_id'])
                            </div>

                        </div>
                        <div class="row">
                            @if($isSuperAdmin)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="status">{{__('post.create-page.status')}}</label>
                                    <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="status" data-toggle="select">
                                        <option value=""></option>
                                        @foreach($listStatus as $status)
                                        <option data-value2="{{$status['value2']}}" value="{{$status['value']}}">{{$status['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @include('alerts.feedback', ['field' => 'status'])
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="published_at">{{__('post.create-page.published_at')}}</label>
                                    <input class="form-control{{ $errors->has('published_at') ? ' is-invalid' : '' }}" name="published_at" id="published_at" type="datetime-local" value="{{old('published_at')}}" id="example-datetime-local-input">
                                </div>
                                @include('alerts.feedback', ['field' => 'published_at'])
                            </div>
                            @endif
                        </div>
                        <label class="form-control-label" for="tag">{{__('post.create-page.hastag')}}</label>
                        <div class="row">
                            @foreach($hastags as $tag)
                            <div class="col-md-2 col-6">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" @if(is_array(old('job_category_ids')) && in_array($tag->id,old('job_category_ids')))
                                    checked="true"
                                    @endif
                                    name="job_category_ids[]"
                                    type="checkbox" id="job_category{{$tag->id}}" value="{{$tag->id}}">
                                    <label class="custom-control-label" for="job_category{{$tag->id}}">{{$tag->name}}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="summary">{{__('post.create-page.summary')}}</label>
                                    <textarea style="height:150px" resize="none" class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}" id="summary" name="summary">{{old('summary')}}</textarea>
                                </div>
                                @include('alerts.feedback', ['field' => 'summary'])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="content">{{__('post.create-page.content')}}</label>
                                    <textarea style="min-height:350px" required="" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="5" id="content">
                                    {{old('content')}}
                                    </textarea>
                                    @include('alerts.feedback', ['field' => 'content'])
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between m-auto" style="width:320px">
                            <a href="{{route('admin.posts.index')}}">
                                <button type="button" style="border-radius:20px; width:150px" class=" btn btn-outline-danger">{{__('post.create-page.buttons.cancel')}}</button>
                            </a>
                            <button type="submit" name="status" value="{{\App\Enums\Post\EPostStatus::Draft->value}}" style="border-radius:20px; width:150px" class=" btn btn-secondary">{{__('post.create-page.buttons.submit-draft')}}</button>
                        </div>
                        <div style="width:320px" class="mx-auto mt-3">
                            <button type="submit" style="border-radius:20px;" class="ml-3 btn-block m-auto btn btn-primary">{{__('post.create-page.buttons.submit-create')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link src="{{ asset('argon') }}/vendor/dropzone/dist/min/dropzone.min.css">
</link>

@endpush

@push('js')
</script>
<script src="{{ asset('argon') }}/vendor/dropzone/dist/min/dropzone.min.js"></script>
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

    Dropzone.autoDiscover = false;
    var CSRF_TOKEN = $('input[name="_token"]').val();
    Dropzone.options.myDropzone = {
        autoDiscover: false,
        maxFiles: 1,
        url: "{{route('admin.posts.upload-file')}}",
        acceptedFiles: ".jpeg,.jpg,.png,.pdf",
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });
            this.on("sending", function(file, xhr, formData) {
                $(".dz-preview").remove();

                formData.append('_token', CSRF_TOKEN);
            })
            this.on("success", function(file, response) {
                if (response.success) {
                    let html = "";
                    html = '<div class="dz-preview-cover dz-processing dz-image-preview">';
                    html += `<img class="dz-preview-img" src="${response.data}"/>`;
                    html += '</div>';
                    $(".dz-preview-single").html(html);
                    $("#image").val(response.data);
                } else {
                    alert(response.message);
                }
            })
            this.on("error", function(file, response) {
                if (response) {
                    console.log(response);
                }
            })
        }
    }
    let myDropzone = new Dropzone(".dropzone")
    $("#status").change(function() {
        const elementStatus = $('#status').find("option:selected");
        const valueStatus = elementStatus.val();
        const value2Status = elementStatus.attr('data-value2');
        if (value2Status == 1 || value2Status == 3) {
            $("#published_at").attr("readonly", true)
        } else {
            $("#published_at").attr("readonly", false)
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
        }
    })
</script>
@endpush
