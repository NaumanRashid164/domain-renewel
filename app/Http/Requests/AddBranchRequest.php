<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBranchRequest extends FormRequest
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
            'county_id' => ['required'],
            'name' => ['required', 'max:255'],
            'branch_name' => ['required', 'max:255','unique:branches,branch_name,'.$this->id],

        ];
    }

    public function messages()
    {
        return [
            'branch_name.required' => 'Branch name is required!',
            'county_id.required' => 'County is required!',
            'branch_name.unique' => 'Branch name should be unique!',

        ];
    }
}
