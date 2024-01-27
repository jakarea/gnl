<?php

namespace App\Http\Requests\Payment;

use App\Http\Requests\BaseFormRequest;

class PaymentRequest extends BaseFormRequest
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

        $rules = [
            'amount' => 'required|numeric',
            'tax' => 'required|numeric|lt:amount',
            'pay_status'=>'required',
            'pay_date'=>'required',
            'payment_service'=>'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'project_id' => ['required', Rule::exists('projects', 'id')],
        ];

        $fieldRules = [];

        if ($this->input('manualyCustomer')) {
            $rules['name'] = ['required', 'string'];
            $rules['designation'] = ['required'];
            $rules['email'] = 'required|unique:customers,email';
        }

        if ($this->filled('customer_id')) {
            unset($fieldRules['name']);
            unset($fieldRules['email']);
            unset($fieldRules['designation']);
        }


        if ($this->isMethod('post')) {
            $rules += $fieldRules;
        }

        if ($this->isMethod('put')) {
            foreach ($fieldRules as $field => $fieldRule) {
                if (!$this->filled($field)) {
                    $rules[$field] = 'filled';
                }
            }
        }

        return $rules;

    }

    protected function prepareForValidation()
    {
        $this->merge([
            'manualyCustomer' => filter_var($this->input('manualyCustomer'), FILTER_VALIDATE_BOOLEAN),
        ]);
    }


}
