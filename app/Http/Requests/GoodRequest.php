<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth ('admin')->check ();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //编辑栏目的时候判断
        $id=$this->route ('category') ? $this->route ('category')->id : null;
        return [
            'title'=>'required',
            'price'=>'required',
            'description'=>'required',
            'list_pic'=>'required',
            'pics'=>'required',
            'content'=>'required'
        ];
    }

    public function messages ()
    {
         return [
             'title.required'=>'请输入商品名称',
             'pics.required'=>'请输入商品图册',
             'content.required'=>'请输入商品详情',
             'list_pic.required'=>'请输入商品列表',
             'price.required'=>'请输入商品价格',
             'description.required'=>'请输入商品描述',
         ];

    }
}
