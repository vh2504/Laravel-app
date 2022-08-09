@extends('layouts.app', [
'title' => __('Category Management'),
'parentSection' => 'category',
'elementName' => 'category'
])

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ __('category.create') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="POST" id="form-category">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">{{__('category.create-page.name')}}</label>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" type="text" value="{{old('name')}}">
                                </div>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="description">{{__('category.create-page.description')}}</label>
                                    <textarea style="height:150px" resize="none" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description"></textarea>
                                </div>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>
                        </div>
                        <div class="d-flex justify-content-between m-auto" style="width:320px">
                            <a href="{{route('admin.categories.index')}}">
                                <button type="button" style="border-radius:20px; width:150px" class=" btn btn-outline-danger">{{__('category.buttons.cancel')}}</button>
                            </a>
                            <button type="submit" style="border-radius:20px; width:150px" class=" btn btn-primary">{{__('category.buttons.submit')}}</button>
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
