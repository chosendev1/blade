<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanProductRequest extends FormRequest
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
            'product_name'      => 'required',
            'interest_method'   => 'required',
            'interest_rate'     => 'required',
            'payment_frequency' => 'required',
            'penalty_rate'      => 'required'

        ];
    }
}
