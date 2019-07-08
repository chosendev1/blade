<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePayment extends FormRequest
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
            total_amount_paid      => 'numeric|required',
            total_principal_amount => 'numeric|required',
            total_interest_amount  => 'numeric|required',
            receipt_number         => 'numeric|required',
            penalty_amount         => 'numeric|nullable',
            payment_date           => 'date_format:"d-m-Y"|required',
        ];
    }
}
