<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoodRequest;
use App\Models\Category;
use App\Models\Good;
use App\Models\Spec;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    //加载主页
    public function index ( Good $good )
    {
        $goods = Good::all ();

        return view ( 'admin.good.index' , compact ( 'goods' ) );
    }

    //添加商品页面
    public function create ( Category $category )
    {
        $categories = $category->getTreeDate ( Category::all ()->toArray () );

        return view ( 'admin.good.create' , compact ( 'categories' ) );
    }


    public function store ( GoodRequest $request , Good $good )
    {
        //dd ($good->toArray ());
        //添加商品表
        $data = $request->all ();
        //dd ($data);
        $data[ 'user_id' ] = auth ( 'admin' )->id ();
        //转为数组
        $specs = json_decode ( $data[ 'specs' ] , true );
        //dd ($specs);
        $total = 0;
        foreach ( $specs as $v ) {

            $total += $v[ 'total' ];
        }
        $data[ 'total' ] = $total;
        //添加商品
        $good = $good->create ( $data );

        foreach ( $specs as $v ) {
            $spec          = new Spec();
            $spec->spec    = $v[ 'spec' ];
            $spec->total   = $v[ 'total' ];
            $spec->good_id = $good->id;
            $spec->save ();
        }

        return redirect ()->route ( 'admin.good.index' )->with ( 'success' , '添加成功' );
    }


    public function edit ( Request $request , Good $good , Category $category )
    {
        //$goods=Good::all ();
        //dd ($goods);
        $categories = $category->getEditCategory ( Category::all ()->toArray () );
        //dd ($categories);
        $spec = json_encode ( Spec::where ( 'good_id' , $good[ 'id' ] )->get () );

        //dd ($spec);
        return view ( 'admin.good.edit' , compact ( 'good' , 'goods' , 'category' , 'categories' , 'spec' ) );
    }

    public function update ( GoodRequest $request , Good $good )
    {
        //添加商品表
        $data = $request->all ();
        //dd ($data);
        $data[ 'user_id' ] = auth ( 'admin' )->id ();
        //转为数组
        $specs = json_decode ( $data[ 'specs' ] , true );
        //dd ($specs);
        $total = 0;
        foreach ( $specs as $v ) {
            $total += $v[ 'total' ];
        }
        //dd ($total);
        $data[ 'total' ] = $total;
        //添加商品
         $good->update ( $data );

        foreach ( $specs as $v ) {
            $spec          = new Spec();
            $spec->spec    = $v[ 'spec' ];
            $spec->total   = $v[ 'total' ];
            $spec->good_id = $good->id;
            $spec->save ();
        }

        return redirect ()->route ( 'admin.good.index' )->with ( 'success' , '添加成功' );
    }


    public function destroy ( Good $good )
    {
        $good->delete ();

        return redirect ()->route ( 'admin.good.index' )->with ( 'success' , '删除成功' );

    }
}
