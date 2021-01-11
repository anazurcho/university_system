<?php

namespace App\Http\Requests\studentshell_requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentShellRequest extends FormRequest
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
            'user_id' => 'required',
            'lecture_id' => 'required',
            'total_score' => 'required',
        ];
    }
}
