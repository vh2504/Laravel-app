@extends('layouts.app', [
    'title' => __('Job collection management'),
    'parentSection' => 'job-categories',
    'elementName' => 'job-categories'
])
@section('title', __('job_category.form.header'))
@php
    $index = 1;
    /**
     * @var \App\Models\JobCategory $model
     * @var \App\Services\Admin\JobCategoryService $service
     */
    $oldCollections = $service->getOldCollections($model->id);
    $oldFeatures = $service->getOldFeatureIds($model->id);
@endphp
@section('content')
    <div class="container-fluid  mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="h3 mb-0">{{ __('job_category.form.header') }}</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.job-categories.update', [$model->id])}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label form-control-label">{{ __('job_category.field.name.label') }}</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" id="input-name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('job_category.field.name.placeholder') }}"
                                                maxlength="255"
                                                value="{{old('name',$model->name)}}"
                                                autofocus>
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label form-control-label">{{ __('job_category.field.is_popular') }}</label>
                                        <div class="col-md-10">
                                            <label class="custom-toggle custom-toggle-success">
                                                <input type="checkbox" name="is_popular" @if (in_array(old('is_popular', $model->is_popular),['1','on'])) checked @endif >
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                            </label>
                                            @include('alerts.feedback', ['field' => 'is_popular'])
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label form-control-label">
                                            {{ __('job_category.field.icon.label') }}
                                        </label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{ $errors->has('icon') ? ' is-invalid' : '' }}" id="icon" name="icon" accept="image/*">
                                                        <label class="custom-file-label" for="customFileLang">{{ __('job_category.field.image.button') }}</label>
                                                    </div>
                                                    @include('alerts.feedback', ['field' => 'icon'])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <img style="max-height: 300px;" id="imp-preview-icon" src="{{ url("storage/job_category/{$model->icon}") }}" class="img-thumbnail"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label form-control-label">
                                            {{ __('job_category.field.image.label') }}
                                        </label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" name="image" accept="image/*">
                                                        <label class="custom-file-label" for="customFileLang">{{ __('job_category.field.image.button') }}</label>
                                                    </div>
                                                    @include('alerts.feedback', ['field' => 'image'])
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <img style="max-height: 300px;" id="imp-preview-image" src="{{ url("storage/job_category/{$model->image}") }}" class="img-thumbnail"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label form-control-label">{{ __('job_category.field.collection') }}</label>
                                        <div class="col-lg-10">
                                            @foreach($service->getCollectionOptions() as $collection)
                                                <div class="form-check form-check-inline">
                                                    <input name="collection_id[]" class="form-check-input" type="checkbox" id="c-{{$collection->id}}" value="{{$collection->id}}"
                                                        @if (in_array(old('collection_id', $collection->id), $oldCollections)) checked @endif
                                                    >
                                                    <label class="form-check-label" for="c-{{$collection->id}}">{{$collection->name}}</label>
                                                </div>
                                            @endforeach
                                            @include('alerts.feedback', ['field' => 'collection_id'])
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label form-control-label">{{ __('job_category.field.feature.label') }}</label>
                                        <div class="col-md-10">
                                            <div class="accordion" id="accordionFeature">
                                                @foreach($service->getTypeOptions() as $type)
                                                    <div class="card">
                                                        <div class="card-header" id="heading-{{$index}}" data-toggle="collapse" data-target="#collapse-{{$index}}" aria-expanded="false" aria-controls="collapse-{{$index}}">
                                                            <h5 class="mb-0">{{$index}}. {{ $type['name'] }}</h5>
                                                        </div>
                                                        <div id="collapse-{{$index}}" class="collapse" aria-labelledby="heading-{{$index}}" data-parent="#accordionFeature">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @php
                                                                            $index++;
                                                                            $groups = array_chunk(\Illuminate\Support\Arr::get($service->getGroupFeatures(),$type['value'],[]), 4);
                                                                    @endphp
                                                                    @foreach($groups as $values)
                                                                        <div class="col-md-3">
                                                                            @foreach($values as $value)
                                                                                <div class="form-check">
                                                                                    <input name="feature_id[]" class="form-check-input" type="checkbox" id="f-{{$value->id}}" value="{{$value->id}}"
                                                                                        @if (in_array(old('feature_id',$value->id),$oldFeatures)) checked @endif
                                                                                    >
                                                                                    <label class="form-check-label" for="f-{{$value->id}}">{{$value->name}}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @include('alerts.feedback', ['field' => 'feature_id'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">

                        </div>
                    </div>
                    <div class="text-left">
                        <button type="reset" class="btn btn-default mt-4">{{ __('job_category.form.button.reset') }}</button>
                        <button type="submit" class="btn btn-success mt-4">{{ __('job_category.form.button.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
