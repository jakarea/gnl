<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ReviewAcceptRequest extends BaseFormRequest
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

            'company_id'=>[
                'required',
                'integer',
                'exists:companies,id',
            ],
            'review_id'=>[
                'required',
                'integer',
                'exists:reviews,id',
            ],
            'status'=>[
                'required',
                'boolean'
            ]
        ];
    }
}
