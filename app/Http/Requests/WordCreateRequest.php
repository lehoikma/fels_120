<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WordCreateRequest extends Request
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
            'category' => 'required|not_in:0',
            'content' => 'required|unique:words,content',
            'content_option.*' => 'required',
        ];
    }

    public function messages()
    {
        $messages['category.not_in'] = trans('word/validations.category_not_in');
        $messages['content.required'] = trans('word/validations.content_required');
        $messages['content.unique'] = trans('word/validations.content_unique');
        foreach ($this->input('content_option') as $key => $val) {
            $messages["content_option.$key.required"] = trans('word/validations.content_option') . $key;
        }
        return $messages;

    }
}
