<?php

namespace App\Http\Requests\Customer;

use App\Http\Requests\BaseFormRequest;


class CustomerRequest extends BaseFormRequest
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
            'email' => 'required|unique:customers,email,' . $this->route('id') . ',customer_id',
        ];

        $fieldRules = [
            'name'        => ['required', 'string'],
            'designation' => ['required'],
        ];

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


}
