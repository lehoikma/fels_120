<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FilterRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'categoryId' => 'required|not_in:0',
            'conditional' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'conditional.required' => trans('word/validations.conditional_required'),
            'categoryId.not_in' => trans('word/validations.category_not_in'),
        ];
    }
}
