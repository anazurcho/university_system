<?php

namespace App\Http\Requests\course_tag_requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseTagRequest extends FormRequest
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
            //
            'name' => 'required|unique:course_tags|min:3'
        ];
    }
}
