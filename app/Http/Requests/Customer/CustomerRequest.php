<?php

namespace App\Http\Requests\Customer;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'avatar' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            'lead_type_id' => ['required', Rule::exists('lead_types', 'lead_type_id')],
            // 'service_type_id' => ['required', Rule::exists('service_types', 'service_type_id')],
        ];

        $fieldRules = [
            'name'        => ['required', 'string'],
            'designation' => ['required'],
        ];


        // $customMessages = [
        //     'service_type_id.required' => 'Please select a service type.',
        // ];


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
