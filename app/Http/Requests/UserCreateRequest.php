<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => "required|between:{$config['password_min_length']}, {$config['password_max_length']}|confirmed",
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('user/validations.user_required'),
            'email.required' => trans('user/validations.email_required'),
            'email.email' => trans('user/validations.email_email'),
            'email.unique' => trans('user/validations.email_unique'),
            'password.required' => trans('user/validations.password_required'),
            'password.between' => trans('user/validations.password_between'),
            'password_confirmation.required' => trans('user/validations.password_confirmation_required'),
        ];
    }
}
