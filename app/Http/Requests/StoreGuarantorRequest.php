<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuarantorRequest extends FormRequest
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
            'loan_applications_id'              => 'required',
            'name_of_guarantor'         => 'required|max:100',
            'relationship_to_applicant' => 'required|max:100',
            'gender'                    => 'required|max:6',
            'nationality'               => 'required|max:25',
            'date_of_birth'             => 'required',
            'religion'                  => 'required|max:50',
            'marital_status'            => 'required|max:10',
            'residential_address'       => 'required|max:200',
            'stage_of_operation'        => 'required|max:50',
            'mobile_no1'                => 'required|max:14',
            'mobile_no2'                => 'nullable|max:14',
            'email_address'             => 'nullable|max:100'
        ];
    }
}
