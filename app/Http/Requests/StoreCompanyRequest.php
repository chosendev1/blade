<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'company_name'      => 'required|max:150',
            'date_established'  => 'required|date:100',
            'telephone_number'  => 'required|max:15',
            'company_email'     => 'required|max:100',
            'country'           => 'required|max:100',
            'district_city'     => 'required|max:100',
            'physical_address'  => 'required|max:100',
            'contact_person'    => 'required|max:100',
            'contact_person_position'  => 'required|max:50',
            'contact_phone_number'     => 'required|max:10'
        ];
    }
}       
