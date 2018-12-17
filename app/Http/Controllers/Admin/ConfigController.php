<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ConfigController extends Controller
{
    public function edit ($name)
    {
          //dd ($name);
        $config=Config::firstOrNew(['name'=>$name]);
        //dd ($config->toArray());

        //加载页面
     return view ('admin.config.edit_'.$name,compact ('name','config'));
    }

    public function update(Request $request, $name){

        $res=Config::updateOrCreate(['name'=>$name],['data'=>$request->all()]);

         hd_edit_env($request->all());

         return back ()->with ('success','配置项更新成功');

    }
}
