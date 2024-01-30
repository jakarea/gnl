<?php

namespace App\Http\Requests\Lead;

use Illuminate\Contracts\Validation\Validator; 
use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class LeadStoreRequest extends FormRequest
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
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'required|nullable|email',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'company' => 'nullable|string',
            'website' => 'nullable|url',
            'kvk' => 'nullable|string',
            'lead_type_id' => 'required|exists:lead_types,lead_type_id',
            'note' => 'nullable|string',
            'state' => 'nullable|string|in:new,in_progress,no_ans,completed,lost',
            'order' => 'nullable|string',
            'status' => 'nullable|string|in:active,inactive',
        ];
    }

}
