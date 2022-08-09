<div class="row station-item" id="item-1">
    <div class="col-md-3">
        <div class="form-group row">
            <label class="col-md-3 col-form-label form-control-label">
                {{ __('job.field.line_station.line.label') }}
{{--                <span class="index">1</span>--}}
                <span class="required">*</span>
            </label>
            <div class="col-md-9">
                <select data-action="suggest-line" name="line_station[0][line_id]" class="form-control" data-url="{{ route('admin.job.suggest.line') }}">
                    @foreach($service->getLineOptions(null) as $station)
                        <option value="{{ $station->value }}">{{ $station->name }}</option>
                    @endforeach
                </select>
                @include('alerts.feedback', ['field' => 'line_station[0][line_id]'])
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group row">
            <label class="col-md-3 col-form-label form-control-label">
                {{ __('job.field.line_station.station.label') }}
{{--                <span class="index">1</span>--}}
                <span class="required">*</span>
            </label>
            <div class="col-md-9">
                <select data-action="suggest-stations" name="line_station[0][station_id]" class="form-control" data-url="{{ route('admin.job.suggest.station') }}">
                    @foreach($service->getStationOptions(null) as $station)
                        <option value="{{ $station->value }}">{{ $station->name }}</option>
                    @endforeach
                </select>
                @include('alerts.feedback', ['field' => 'line_station[0][station_id]'])
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-sm-5 col-form-label form-control-label">
                {{ __('job.field.line_station.distance.label') }}
{{--                <span class="index">1</span>--}}
                <span class="required">*</span>
            </label>
            <div class="col-sm-7">
                <input type="text" name="line_station[0][distance]" id="input-name"
                    class="form-control {{ $errors->has('distance') ? ' is-invalid' : '' }}"
                    maxlength="255"
                    value="{{old('line_station[0][distance]','')}}"
                >
                @include('alerts.feedback', ['field' => 'line_station[0][distance]'])
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="btn-group" role="group">
            <button data-action="job-btn-remove" type="button" class="btn btn-danger">
                <i class="fa fa-subtract" aria-hidden="true"></i>
            </button>
            <button data-action="job-btn-add" type="button" class="btn btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>