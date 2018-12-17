<?php

namespace App\Http\Controllers\Home;

use App\Models\Good;
use App\Models\Spec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends CommonController
{
    public function index ( Good $content )
    {
        //获取所有的栏目内容
        //$contents=Category::all ();
        //dd ($contents);
        return view ( 'home.content.index' , compact ( 'content' ) );
    }

    public function specGetTotal (Request $request)
    {
          //规格表
        return Spec::find($request->id);
    }
}
