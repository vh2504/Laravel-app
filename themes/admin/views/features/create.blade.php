@extends('layouts.app', [
'title' => __('Feature Management'),
'parentSection' => 'collection',
'elementName' => 'feature'
])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('feature.create') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.features.store')}}" method="POST" id="form-feature" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="title">{{__('feature.columns.name')}}</label>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" type="text" value="{{old('name')}}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="type_group">{{__('feature.columns.type_group')}}</label>
                                    <select class="form-control{{ $errors->has('type_group') ? ' is-invalid' : '' }}" name="type_group" id="type_group" data-toggle="select">
                                        @foreach($typeGroups as $group)
                                        <option @if(old('type_group')==$group->value) selected @endif value="{{$group->value}}">{{__('feature.type_group.'.strtolower($group->name))}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @include('alerts.feedback', ['field' => 'type_group'])
                            </div>
                        </div>
                        @php
                        $listJobCategoryId = old('job_category_ids',[]);
                        @endphp
                        <div class="accordion" id="accordionFeature">
                            @foreach($collections as $index => $collection)
                            <div class="card">
                                <div class="card-header" id="heading-{{$index}}" data-toggle="collapse" data-target="#collapse-{{$index}}" aria-expanded="false" aria-controls="collapse-{{$index}}">
                                    <h5 class="mb-0"> {{$index + 1}}. {{$collection->name}}:</h5>
                                </div>
                                <div id="collapse-{{$index}}" class="collapse" aria-labelledby="heading-{{$index}}" data-parent="#accordionFeature">
                                    <div class="card-body">
                                        <div class="row px-3">
                                            @foreach($collection->jobCategories as $jobCate)
                                            <div class="col-md-3 col-sm-6 custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input" @if(is_array($listJobCategoryId) && in_array($jobCate->id,$listJobCategoryId))
                                                checked="true"
                                                @endif
                                                name="job_category_ids[]"
                                                type="checkbox" id="job_category{{$jobCate->id.'-'.$collection->id}}" value="{{$jobCate->id}}">
                                                <label class="custom-control-label" for="job_category{{$jobCate->id.'-'.$collection->id}}">{{$jobCate->name}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @if(count($jobCategoryNotInCollections))
                            <div class="card">
                                <div class="card-header" id="heading-{{count($collections) + 1}}" data-toggle="collapse" data-target="#collapse-{{count($collections) + 1}}" aria-expanded="false" aria-controls="collapse-{{count($collections) + 1}}">
                                    <h5 class="mb-0"> {{count($collections) + 1}}. {{__('feature.job_category_orther')}}:</h5>
                                </div>
                                <div id="collapse-{{count($collections) + 1}}" class="collapse" aria-labelledby="heading-{{count($collections) + 1}}" data-parent="#accordionFeature">
                                    <div class="card-body">
                                        <div class="row px-3">
                                            @foreach($jobCategoryNotInCollections as $jobCate)
                                            <div class="col-md-3 col-sm-6 custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input" @if(is_array($listJobCategoryId) && in_array($jobCate->id,$listJobCategoryId))
                                                checked="true"
                                                @endif
                                                name="job_category_ids[]"
                                                type="checkbox" id="job_category{{$jobCate->id.'-'.$collection->id}}" value="{{$jobCate->id}}">
                                                <label class="custom-control-label" for="job_category{{$jobCate->id.'-'.$collection->id}}">{{$jobCate->name}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>


                       
                        <div class="d-flex justify-content-between m-auto" style="width:320px">
                            <a href="{{route('admin.features.index')}}">
                                <button type="button" style="border-radius:20px; width:150px" class=" btn btn-outline-danger">{{__('feature.buttons.cancel')}}</button>
                            </a>
                            <button type="submit" style="border-radius:20px; width:150px" class=" btn btn-primary">{{__('feature.buttons.submit')}}</button>
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
@endpush
