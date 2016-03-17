<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryCreateRequest extends Request
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
            $config = config('common.category'),
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'number' => "required|integer|min:{$config['number_min']}",
            'images' => 'required|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('category/validations.name_required'),
            'name.unique'=> trans('category/validations.name_unique'),
            'number.required' => trans('category/validations.number_required'),
            'number.integer' => trans('category/validations.number_integer'),
            'number.min' => trans('category/validations.number_min'),
            'description.required' => trans('category/validations.description_required'),
            'images.required' => trans('category/validations.images_required'),
            'images.mimes' => trans('category/validations.images_mimes'),
        ];
    }
}
