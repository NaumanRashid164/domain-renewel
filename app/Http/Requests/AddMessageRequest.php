<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMessageRequest extends FormRequest
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
            'date' => ['required', 'max:255'],
            'title' => ['required', 'max:255','unique:message_set_ups,title,'.$this->id],
            'message' => ['required'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'branch_name.required' => 'Branch bane is required!',
    //         'branch_name.unique' => 'Branch name should be unique!',
    //     ];
    // }
}
