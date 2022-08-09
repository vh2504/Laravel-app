<?php

namespace App\Http\Requests\Admin\Job;

use Illuminate\Foundation\Http\FormRequest;

class JobFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Image
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,webp|mimetypes:image/jpeg,image/png,image/jpg,image/webp',
            // title
            'title' => 'required|max:255',

            // status
            'status' => 'required|numeric',

            'office_name' => 'required|max:255',
            'postal_code' => 'required|max:20',
            'prefecture_id' => 'required|numeric|max:11',
            'city_id' => 'required|numeric|max:11',

            // line_station
            'line_station.*.line_id' => 'required|numeric',
            'line_station.*.station_id' => 'required|numeric',
            'line_station.*.distance' => 'required|numeric',

            // Content
            'content' => 'required',
            'content.title' => 'required|max:255',
            'content.text' => 'required|max:255',

            // description
            'description.feature_id' => 'required',

            // collection
            'collection_id' => 'required',
            'category_id' => 'required',

            // salary
            'salary.type' => 'required',
            'salary.pay' => 'required',
            'salary.min' => 'required',

            /**
             * Validate job_feature
             */
            // 仕事内容
            'job_feature.2' => 'required',
            // 休日
            'job_feature.5' => 'required',
            // 勤務時間
            'job_feature.4' => 'required',
            // 応募条件
            'job_feature.6' => 'required',

            // holiday
//            'holiday.feature_id' => 'required',

            // requirement
            'requirement.feature_id' => 'required',
            'requirement.note' => 'required',

            // process
            'process' => 'required',
        ];
    }

    /**
     * Get message validate
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'image.required' => __('job.validations.image.required'),

            'title.required' => __('job.validations.title.required', ['max' => 255]),
            'title.max' => __('job.validations.title.max'),

            'status.required' => __('job.validations.status.required'),

            // office_name
            'office_name.required' => __('job.validations.office_name.required', ['max' => 255]),
            'office_name.max' => __('job.validations.office_name.max'),

            // postal_code
            'postal_code.required' => __('job.validations.postal_code.required', ['max' => 20]),
            'postal_code.max' => __('job.validations.postal_code.max'),

            // prefecture_id
            'prefecture_id.required' => __('job.validations.prefecture_id.required', ['max' => 11]),
            'prefecture_id.max' => __('job.validations.prefecture_id.max'),

            // city_id
            'city_id.required' => __('job.validations.city_id.required', ['max' => 11]),
            'city_id.max' => __('job.validations.city_id.max'),

            'content.title.required' => __('job.validations.content.title.required'),
            'content.text.required' => __('job.validations.content.text.required'),
            'collection_id.required' => __('job.validations.collection_id.required'),
            'category_id.required' => __('job.validations.category_id.required'),

            // description
            'description.feature_id.required' => __('job.validations.description.feature_id.required'),

            // salary
            'salary.type.required' => __('job.validations.salary.type.required'),
            'salary.pay.required' => __('job.validations.salary.pay.required'),
            'salary.min.required' => __('job.validations.salary.min.required'),

            'job_feature.2.required' => __('job.validations.job_feature.2.required'),
            'job_feature.4.required' => __('job.validations.job_feature.4.required'),
            'job_feature.5.required' => __('job.validations.job_feature.5.required'),
            'job_feature.6.required' => __('job.validations.job_feature.6.required'),

            // requirement
            'requirement.feature_id.required' => __('job.validations.requirement.feature_id.required'),
            'requirement.note.required' => __('job.validations.requirement.note.required'),
            // process
            'process.required' => __('job.validations.process.required'),
        ];
    }
}
