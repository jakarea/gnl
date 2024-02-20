<?php

namespace App\Http\Requests\Payment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
class PaymentRequest extends FormRequest
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
            'pay_status'=>'required|in:paid,unpaid',
            'pay_date'=>'required',
            'pay_services'=>'required',
            'pay_date'=>'required',
            'pay_type'=>'required|in:one_time,repeated',
        ];

        $fieldRules = [
            'customer_id' => ['required', Rule::exists('customers', 'customer_id')],
        ];

        if ($this->input('manualyCustomer')) {
            $rules['name'] = ['required', 'string'];
            $rules['designation'] = ['required'];
            $rules['email'] = 'required|unique:customers,email';
            unset($fieldRules['customer_id']);
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
