@extends('layouts.app', [
    'title' => __('Collection management'),
    'parentSection' => 'collection',
    'elementName' => 'collection'
])

@section('title', __('collection.form.header'))

@section('content')
    <div class="container-fluid  mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="h3 mb-0">{{ __('collection.form.header') }}</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.collection.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label form-control-label">{{ __('collection.field.name') }}</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" id="input-name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('collection.field.name') }}"
                                                maxlength="255"
                                                value="{{old('name','')}}"
                                                autofocus>
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label form-control-label">
                                            {{ __('collection.field.icon.label') }}
                                        </label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{ $errors->has('icon') ? ' is-invalid' : '' }}" id="icon" name="icon" accept="image/*">
                                                        <label class="custom-file-label" for="customFileLang">{{ __('collection.field.image.button') }}</label>
                                                    </div>
                                                    @include('alerts.feedback', ['field' => 'icon'])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <img style="max-height: 300px;" id="imp-preview-icon" class="img-thumbnail"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label form-control-label">
                                            {{ __('collection.field.image.label') }}
                                        </label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" name="image" accept="image/*">
                                                        <label class="custom-file-label" for="customFileLang">{{ __('collection.field.image.button') }}</label>
                                                    </div>
                                                    @include('alerts.feedback', ['field' => 'image'])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <img style="max-height: 300px;" id="imp-preview-image" src="" class="img-thumbnail"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label form-control-label">
                                            {{ __('collection.field.summary.label') }}
                                        </label>
                                        <div class="col-md-10">
                                            <input name="summary" id="input-name" class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}" value="{{old('summary','')}}"/>
                                            @include('alerts.feedback', ['field' => 'summary'])
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label form-control-label">
                                                    {{ __('collection.field.priority.label') }}
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="number" name="priority" id="input-name" class="form-control{{ $errors->has('priority') ? ' is-invalid' : '' }}" placeholder="0" maxlength="2" value="{{old('priority','0')}}" autofocus>
                                                    @include('alerts.feedback', ['field' => 'priority'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-1 col-form-label form-control-label">{{ __('collection.field.job_category.label') }}</label>
                                <div class="col-lg-11" style="padding-left: 60px;">
                                    <div class="row">
                                        @foreach($listOptions as $categories)
                                            <div class="col-md-2">
                                                @foreach($categories as $category)
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" name="category_id[]" id="jc-{{$category['id']}}" type="checkbox" value="{{$category['id']}}" @if (old('category_id') == $category['id']) checked @endif>
                                                        <label class="custom-control-label" for="jc-{{$category['id']}}">{{$category['name']}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                    @include('alerts.feedback', ['field' => 'category_id'])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button type="reset" class="btn btn-default mt-4">{{ __('collection.form.button.reset') }}</button>
                        <button type="submit" class="btn btn-success mt-4">{{ __('collection.form.button.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
