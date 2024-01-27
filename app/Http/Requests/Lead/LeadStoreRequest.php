<?php

namespace App\Http\Requests\Lead;

use App\Http\Requests\BaseFormRequest;

class LeadStoreRequest extends BaseFormRequest
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
            'avatar' => 'nullable|string',
            'name' => 'required|string',
            'lead_type_id' => 'required|exists:lead_types,lead_type_id',
            'phone' => 'nullable|string',
            'email' => 'required|nullable|email',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'socials' => 'nullable|string',
            'company' => 'nullable|string',
            'website' => 'nullable|url',
            'kvk' => 'nullable|string',
            'note' => 'nullable|string',
        ];
    }

}
