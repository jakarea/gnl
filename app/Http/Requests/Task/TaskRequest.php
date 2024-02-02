<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
class TaskRequest extends FormRequest
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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_id' => ['required', Rule::exists('projects', 'project_id')],
            'priority' => ['required', 'in:basic,important,priority'],
        ];

        $fieldRules = [
            'title' => ['required'],
            'date' => ['required'],
            'schedule' => ['required'],
            'service_type_id' => ['required', Rule::exists('service_types', 'service_type_id')],
            'lead_type_id' => ['required', Rule::exists('lead_types', 'lead_type_id')],
        ];


        if ($this->input('manualyCustomer')) {
            $rules['name'] = ['required', 'string'];
            $rules['designation'] = ['required'];
            $rules['email'] = 'required|unique:customers,email';
        }

        if ($this->filled('customer_id')) {
            unset($fieldRules['name']);
            unset($fieldRules['email']);
            unset($fieldRules['designation']);
            unset($fieldRules['service_type_id']);
            unset($fieldRules['lead_type_id']);
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
