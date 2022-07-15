<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'first_name' => ['required','max:255'],
            'sur_name' => ['required','max:255'],
            'full_name' => ['required','max:255'],
            'address_1' => ['required','max:255'],
            'address_2' => ['required','max:255'],
            'gender' => ['required'],
            'county_id' => ['required'],
            'branch_id' => ['required'],
            'eircode' => ['required'],
            'membership' => ['required'],
            // 'membership_number' => ['required'],
            'email' => ['required', 'max:255','unique:members,email,'.$this->id],
            'phone_number' => ['required'],
            'start_date' => ['required'],
            'payment_method' => ['required'],
            'farming_enterprise' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'branch_id.required' => 'Branch name is required!',
        ];
    }
}
