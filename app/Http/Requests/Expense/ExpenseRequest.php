<?php

namespace App\Http\Requests\Expense;

use App\Http\Requests\BaseFormRequest;

class ExpenseRequest extends BaseFormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'title' => 'required|string',
            'pay_date' => 'required',
            'service_type' => 'required',
            'amount' => 'required|numeric',
            'tax' => 'required|numeric',
            // 'type' => 'in:Fixed,Variable'
        ];
    }
}
