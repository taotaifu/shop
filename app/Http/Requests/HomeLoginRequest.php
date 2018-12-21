<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeLoginRequest extends FormRequest
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
            'email'    => 'required|email' ,
            'password' => 'required'
        ];
    }

    public function messages ()
    {
        return [
            'email.required'    => '请输入注册邮箱' ,
            'email.email'       => '邮箱格式不正确' ,
            'password.required' => '请输入密码'
        ];
    }
}
