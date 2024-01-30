<?php

namespace App\Http\Requests\Customer;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

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
            'avatar' => 'file|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];

        $fieldRules = [
            'name'        => ['required', 'string'],
            'designation' => ['required'],
            'service_type_id'=>['required','int','exists:service_types,service_type_id'],
        ];


        // $customMessages = [
        //     'service_type_id.required' => 'Please select a service type.',
        //     'service_type_id.int' => 'Service type must be an integer.',
        //     'service_type_id.exists' => 'The selected service type does not exist.',
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
