<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth( 'admin' )->check();
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
            'name' => 'required|unique:categories,name,'.$id ,
            'pid' => 'required' ,
        ];
    }

    public function messages ()
    {
       return [
         'name.required'=>'请输入栏目名称',
         'pid.required'=>'请选择所属栏目',
           'name.unique'=>'栏目名称已经存在',
       ];
    }
}
