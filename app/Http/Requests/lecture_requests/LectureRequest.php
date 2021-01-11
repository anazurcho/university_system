<?php

namespace App\Http\Requests\lecture_requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LectureRequest extends FormRequest
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
            'name' => ['required', 'min:3', Rule::unique('lectures')->ignore($this->lecture->id)],
            'course_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
