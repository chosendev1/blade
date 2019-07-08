<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollateralRequest extends FormRequest
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
            'loan_applications_id' => 'required',
            'collateral_type'      => 'required|max:255',
            'collateral_value'     => 'required',
            'collateral_location'  => 'required|max:255'
        ];
    }
}
