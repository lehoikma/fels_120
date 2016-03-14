<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserLoginRequest extends Request
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
            $config = config('common.user'),
            'email' => 'required|email',
            'password' => "required|between:{$config['password_min_length']}, {$config['password_max_length']}",
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('user/validations.email_required'),
            'email.email' => trans('user/validations.email_email'),
            'password.required' => trans('user/validations.password_required'),
            'password.between' => trans('user/validations.password_between'),
        ];
    }
}
