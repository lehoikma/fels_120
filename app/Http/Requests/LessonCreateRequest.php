<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LessonCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:lessons,name',
            'category' => 'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('lesson/validations.name_required'),
            'name.unique'=> trans('lesson/validations.name_unique'),
            'category.not_in' => trans('lesson/validations.category_not_in'),
        ];
    }
}
