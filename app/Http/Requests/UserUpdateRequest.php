<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
        $input = $this->all();
        $idUser = $input['userId'];
        $config = config('common.user');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' .$idUser,
            'password' => "required|between:{$config['password_min_length']}, {$config['password_max_length']}|confirmed",
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('user/validations.user_required'),
            'email.required' => trans('user/validations.email_required'),
            'email.unique' => trans('user/validations.email_unique'),
            'email.email' => trans('user/validations.email_email'),
            'password.required' => trans('user/validations.password_required'),
            'password.between' => trans('user/validations.password_between'),
            'password.confirmed' => trans('user/validations.password_confirmed'),
            'password_confirmation.required' => trans('user/validations.password_confirmation_required'),
        ];
    }

}
