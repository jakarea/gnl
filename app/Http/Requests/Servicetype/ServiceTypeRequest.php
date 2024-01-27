<?php

namespace App\Http\Requests\Servicetype;

use App\Http\Requests\BaseFormRequest;

class ServiceTypeRequest extends BaseFormRequest
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
            'name' => 'required',
        ];

        if ($this->isMethod('post')) {
            $rules['name'] = 'required|string';
        }

        if ($this->isMethod('put')  && !$this->filled('name')) {
            $rules['name'] = 'filled';
        }
  
        return $rules;
    }
}
