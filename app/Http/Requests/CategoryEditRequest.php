<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryEditRequest extends Request
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
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('category/validations.name_required'),
            'name.unique' => trans('category/validations.name_unique'),
            'number.required' => trans('category/validations.number_required'),
            'description.required' => trans('category/validations.description_required'),
        ];
    }
}
