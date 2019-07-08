<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManualPaymentsRequest extends FormRequest
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
            'loan_application_id' => 'required',
            'principal_paid'       => 'required|numeric',
            'interest_paid'        => 'required|numeric',
            'penalty_paid'         => 'required|numeric',
            'payment_date'         => 'required|date',
            'receipt_number'       => 'nullable',
            'cheque_number'        => 'nullable',
            'bank_name'            => 'nullable',
            'payment_method'       => 'required'
        ];
    }
}
