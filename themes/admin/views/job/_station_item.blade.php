@php
    /**
    * @var \App\Services\Admin\JobService  $service
    * @var \App\Models\Job  $model
    * @var array  $featureGroups
    */
    $index = 1;
@endphp
@foreach($model->lineStations as $lineStation)
    <div class="row station-item" id="item-{{ $index }}">
        <div class="col-md-3">
            <div class="form-group row">
                <label class="col-md-3 col-form-label form-control-label">
                    {{ __('job.field.line_station.line.label') }}
{{--                    <span class="index">{{ $index }}</span>--}}
                    <span class="required">*</span>
                </label>
                <div class="col-md-9">
                    <select data-action="suggest-line" name="line_station[{{ $index }}][line_id]" class="form-control" data-url="{{ route('admin.job.suggest.line') }}">
                        @foreach($service->getLineOptions($lineStation->line_id) as $line)
                            <option value="{{ $line->value }}">{{ $line->name }}</option>
                        @endforeach
                    </select>
                    @include('alerts.feedback', ['field' => "line_station[{$index}][line_id]"])
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group row">
                <label class="col-md-3 col-form-label form-control-label">
                    {{ __('job.field.line_station.station.label') }}
{{--                    <span class="index">{{ $index }}</span>--}}
                    <span class="required">*</span>
                </label>
                <div class="col-md-9">
                    <select data-action="suggest-stations" name="line_station[{{ $index }}][station_id]" class="form-control" data-url="{{ route('admin.job.suggest.station') }}">
                        @foreach($service->getStationOptions($lineStation->station_id) as $station)
                            <option value="{{ $station->value }}">{{ $station->name }}</option>
                        @endforeach
                    </select>
                    @include('alerts.feedback', ['field' => "line_station[{$index}][station_id]"])
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label class="col-sm-5 col-form-label form-control-label">
                    {{ __('job.field.line_station.distance.label') }}
{{--                    <span class="index">{{ $index }}</span>--}}
                    <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="line_station[{{ $index }}][distance]" id="input-name"
                        class="form-control {{ $errors->has('distance') ? ' is-invalid' : '' }}"
                        maxlength="255"
                        value="{{old("line_station[{$index}][distance]", $lineStation->distance ??'' )}}"
                    >
                    @include('alerts.feedback', ['field' => "line_station[{$index}][distance]"])
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
    @php
        $index ++;
    @endphp
@endforeach
