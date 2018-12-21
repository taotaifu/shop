<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'name'=>'required',
            'province'=>'required',
            'detail'=>'required',
            'phone'=>'required|digits:11',
            'sex'=>'required',
        ];
    }

    public function messages ()
    {
        return [
            'name.required'=>'请输入收货人姓名',
            'province.required'=>'请选地址',
            'detail.required'=>'请输入详细地址',
            'phone.required'=>'请输入收货人联系方式',
            'phone.digits'=>'手机号格式有误',
            'sex.required'=>'请选择性别',
        ];
    }
}
