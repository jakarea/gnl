<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\BaseFormRequest;
class ProjectRequest extends BaseFormRequest
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
            'manualyCustomer' => 'boolean',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $fieldRules = [
            'title' => ['required'],
            'priority' => ['in:Basic,Important,Priority'],
            'amount' => ['required','numeric'],
            'tax' => ['required','numeric','lt:amount'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ];

        if ($this->input('manualyCustomer')) {
            $rules['name'] = ['required', 'string'];
            $rules['designation'] = ['required'];
            $rules['email'] = 'required|unique:customers,email';
        }

        if ( $this->filled('customer_id')) {
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
