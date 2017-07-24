<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'project_name' => 'required ',
            'project_desc' => 'required|max:500',
            // 'project_generation' => 'required',
            // 'project_cost' => 'required|min:1||numeric',
            // 'project_own' => 'required|min:1|numeric',
            // 'project_looking' => 'required|min:1|numeric',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'project_cost.required' => 'only number SGD',
    //         'project_own.required' => 'only number SGD',
    //         'project_looking.required' => 'only number SGD',
    //     ];
    // }
}
