<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name_of_applicant' => 'required|max:100',
            'branch_id'            => 'required|max:100',
            'member_number'     => 'required|max:10',
            'gender'            => 'required',
            'maritual_status'   => 'required|max:10',
            'nationality'       => 'required|max:50',
            'date_of_birth'     => 'required|date',
            'phone_number'      => 'required|max:15',
            //'phone_number2'   => 'nullable|max:10',
            'email_address'     => 'nullable',
            'country'           => 'required|max:10',
            'district_city'     => 'nullable|max:200',
            'physical_address'  => 'required|max:200',
            'next_of_kin'       => 'required|max:100',
            'next_of_kin_phone_number' => 'required|max:15'
        ];
    }
}
